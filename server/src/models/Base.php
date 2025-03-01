<?php

require_once("../database/connection.php");
class BaseModel{
    protected $conn;
    public $table;
    public function __construct() {
        $this->conn = (new DatabaseConnection())->getPdo();
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
}
