<?php
require_once("./Base.php");

Class AdressModel extends BaseModel{
    public $name;
    public $email;  
    public $password;

    public function __construct($name , $email,$password) {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    function  save() {
    }
}