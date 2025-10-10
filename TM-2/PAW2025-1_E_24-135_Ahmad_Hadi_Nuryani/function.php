<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_alfabate($data) {
    return preg_match("/^[a-zA-Z\s']+$/", $data);
}

function is_number($data) {
    return preg_match("/^[0-9]+$/", $data);
}

function is_alphanumeric($data) {
    return preg_match("/^[a-zA-Z0-9\s]+$/", $data);
}

function is_valid_length_numeric($data, $min, $max) {
    $len = strlen($data);
    return ($len >= $min && $len <= $max);
}

function is_valid_length_string($data, $min, $max) {
    $len = strlen($data);
    return ($len >= $min && $len <= $max);
}

function alamat($data){
    return preg_match("/^[a-zA-Z0-9\s,.\-#]+$/", $data);
}
?>
