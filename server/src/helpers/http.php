<?php

function getQueryParams()
{
    $data = [];
    foreach ($_GET as $key => $value) {
        $data[$key] = $value;
    }
    return $data;
}

function getRequestBody()
{
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

    if (stripos($contentType, 'application/json') !== false) {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        }
    }

    if (stripos($contentType, 'application/x-www-form-urlencoded') !== false) {
        return $_POST;
    }

    return null;
}



function response($data, $status = 200)
{
    http_response_code($status);
    echo json_encode($data);
}