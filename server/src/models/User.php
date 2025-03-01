<?php
require_once("Base.php");

Class UserModel extends BaseModel
{
    public $name;
    public $email;
    public $password;
    public $phone_number;
    public $ceated_date;
    public $role;

    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $name, string $email, string $password, string $phone_number, string $role): void
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->role = $role;

        $stmt = $this->conn->prepare("INSERT INTO users (name,email,password,phone_number,role) VALUES (:name,:email,:password,:phone_number,:role)");
        $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => password_hash($this->password, PASSWORD_DEFAULT),
            ':phone_number' => $this->phone_number,
            ':role' => $this->role
        ]);
    }

    public function findById(int $id): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    public function deleteById(int $id): void
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
   
}
