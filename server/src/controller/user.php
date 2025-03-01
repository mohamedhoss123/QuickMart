<?php

require_once("../helpers/controller.php");
require_once("../helpers/http.php");
require_once("../models/User.php");
get(function(){
    echo "hellow0"; 
});



post(function(){
    $user = new UserModel(...getRequestBody());
    $user->save();
});



