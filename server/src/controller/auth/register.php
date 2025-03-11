<?php
require_once "../../helpers/controller.php";
require_once "../../models/User.php";

post(function () {
    $data = getRequestBody();
    $data = validate(["name"=>"string", "email"=>"email", "password"=>"string","phone_number"=>"string"], $data);
    (new UserModel())->create(...[...$data,"role"=>"user"]);
    response("Created", 201);
});

