<?php
require_once("../../../helpers/controller.php");
require_once("../../../models/User.php");
post(function () {
    $data = getRequestBody();
    $user = (new UserModel())->create(...[...$data,"role"=>"user"]);
    response($user, 201);
});

