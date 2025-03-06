<?php 


require_once __DIR__ . "/../helpers/session.php";

$session = new SessionHelper();

if (!$session->isAuth()) {
    header("Location: /auth/login.php");
    exit();
}