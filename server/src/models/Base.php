<?php

require_once(__DIR__."/../database/connection.php");
class BaseModel{
    protected $conn;
    public $table;
    public function __construct() {
        $this->conn = (new DatabaseConnection())->getPdo();
    }
    public function findAll(): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findById(int $id): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    public function deleteById(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function select(array $fields,string $sql, array $params = []): array
    {
        $stmt = $this->conn->prepare("select ".implode(",", $fields)." from $this->table ".$sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
