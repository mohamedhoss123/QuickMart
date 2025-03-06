<?php

require_once __DIR__ . "/../helpers/session.php";

$session = new SessionHelper();

if (!$session->isAuth()&& $session->data['role'] !== 'admin') {
    header("Location: /admin/auth/login.php");
    exit();
}