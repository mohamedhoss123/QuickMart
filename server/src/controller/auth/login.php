<?php
require_once("../../helpers/controller.php");
require_once("../../helpers/http.php");
require_once("../../helpers/session.php");
require_once("../../models/User.php");

post(function () {
    
   $data = getRequestBody();
   $user = (new UserModel())->findByEmail($data['email']);
   
   if ($user && password_verify($data['password'], $user["password"])) {
       $session = new SessionHelper();
       $session->createSession(["id" => $user["id"], "email" => $user["email"],"role" => $user["role"]]);
       response(["message" => "Login successful"], 200);
       
   } else {
       response(["message" => "Invalid email or password"], 401);
   }
});
