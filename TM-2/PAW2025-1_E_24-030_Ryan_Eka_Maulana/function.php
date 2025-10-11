<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function is_empty($val) {
    return strlen(trim($val)) === 0;
}

function is_alpha($val) {
    return preg_match("/^[a-zA-Z\s]+$/", $val);
}

function is_numeric_str($val) {
    return preg_match("/^\d+$/", $val);
}

function is_alnum_space($val) {
    return preg_match("/^[a-zA-Z0-9\s\.,\-\/]+$/", $val);
}

function length_is($val, $len) {
    return mb_strlen($val) == $len;
}

function length_between($val, $min, $max) {
    $l = mb_strlen($val);
    return ($l >= $min && $l <= $max);
}

function valid_email($val) {
    return filter_var($val, FILTER_VALIDATE_EMAIL) !== false;
}
