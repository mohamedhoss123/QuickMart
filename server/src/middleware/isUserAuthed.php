<?php 


require_once __DIR__ . "/../helpers/session.php";

$session = new SessionHelper();

if (!$session->isAuth()) {
    response(["message" => "Unauthorized"], 401);

}