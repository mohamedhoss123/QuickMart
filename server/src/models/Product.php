<?php
require_once __DIR__ . "/Base.php";


Class ProductModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $name, string $email, string $password, string $phone_number, string $role): void
    {

        $stmt = $this->conn->prepare("INSERT INTO products (name,email,password,phone_number,role) VALUES (:name,:email,:password,:phone_number,:role)");
        $stmt->execute([
            
    
        ]);
    }
}