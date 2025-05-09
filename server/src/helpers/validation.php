<?php

$validators = [
    'email' => function($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        throw new InvalidArgumentException('Invalid email');
    },
    'number' => function($number) {
        if (is_numeric($number)) {
            return $number;
        }
        throw new InvalidArgumentException('Invalid number');
    },
    'string' => function($string) {
        if (is_string($string)) {
            return $string;
        }
        throw new InvalidArgumentException('Invalid string');
    },
];





function validate(array $rules, array $data) {
    global $validators;
    $res = [];
    $errors = [];
    foreach ($rules as $key => $rule) {
        if (isset($data[$key])) {
            $res[$key] = $validators[$rule]($data[$key]);
        }else{
            array_push($errors, "$key must be type of $rule");
        }
    }
    if (count($errors) > 0) {
        response($errors, 400);
        
    }
    return $res;
}