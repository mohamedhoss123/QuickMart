<?php
require_once("../../../helpers/controller.php");

post(function () {
    $data = getRequestBody();
    $data=validate(["email" => "email", "password" => "string"], $data);
    var_dump($data);
    $user = (new UserModel())->findByEmail($data['email']);
    
    if ($user && $user["role"] === "admin" && password_verify($data['password'], $user["password"])) {
        $session = new SessionHelper();
        $session->createSession(["id" => $user["id"], "email" => $user["email"], "role" => $user["role"]]);
        response(["message" => "Login successful"], 200);
        
    } else {
        response(["message" => "Invalid email or password"], 401);
    }
});