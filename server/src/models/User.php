<?php
require_once("Base.php");

Class UserModel extends BaseModel{
    public $name;
    public $email;  
    public $password;
    public $phone_number;
    public $ceated_date;
    public $role;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $phone_number,
        string $role,
    ) {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->role = $role;
    }
    function  save() {
        $stmt  = $this->conn->prepare("INSERT INTO users (name,email,password,phone_number,role) VALUES (:name,:email,:password,:phone_number,:role)");
        $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
            ':phone_number' => $this->phone_number,
            ':role' => $this->role
        ]);
        
    }
}