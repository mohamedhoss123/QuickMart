<?php

require_once("../database/connection.php");
class BaseModel{
    protected $conn;
    public function __construct() {
        $this->conn = (new DatabaseConnection())->getPdo();
    }
}
