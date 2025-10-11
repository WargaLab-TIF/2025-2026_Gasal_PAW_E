<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function wajib_diisi($value) {
    return !empty(trim($value));
}

function alfabet($value) {
    return preg_match("/^[a-zA-Z ]+$/", $value);
}

function numerik($value) {
    return preg_match("/^[0-9]+$/", $value);
}

function alamat($value) {
    return preg_match("/^[a-zA-Z0-9.,\s]+$/", $value);
}

function panjang_karakter($value, $min, $max) {
    $len = strlen(trim($value));
    return $len >= $min && $len <= $max;
}

function panjang_tepat($value, $len) {
    return strlen(trim($value)) === $len;
}

function minimalaset($value, $min) {
    return is_numeric($value) && $value >= $min;
}

?>
