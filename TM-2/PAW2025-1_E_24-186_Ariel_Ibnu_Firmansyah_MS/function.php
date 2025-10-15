<?php

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function wajib_isi($data) {
    return !empty($data);
}

function alfabet($data) {
    return preg_match("/^[a-zA-Z\s]+$/", $data);
}

function numerik($data) {
    return preg_match("/^[0-9]+$/", $data);
}

function email($data) {
    return filter_var($data, FILTER_VALIDATE_EMAIL);
}

function alfanumerik($data) {
    return preg_match("/^[a-zA-Z0-9\s\.,-]+$/", $data);
}

?>