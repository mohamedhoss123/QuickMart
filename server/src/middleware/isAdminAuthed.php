<?php

require_once __DIR__ . "/../helpers/session.php";

$session = new SessionHelper();

if (!$session->isAuth()&& $session->data['role'] !== 'admin') {
    response(["message" => "Unauthorized"], 401);
}