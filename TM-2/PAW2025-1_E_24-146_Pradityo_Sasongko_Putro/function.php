<?php
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function tidak_boleh_kosong($data){
    return !empty(trim($data));
}

// Hanya huruf dan spasi
function alfabet($data){
    return preg_match("/^[a-zA-Z\s]+$/", $data);
}

// Hanya angka
function numerik($data){
    return preg_match("/^[0-9]+$/", $data);
}

// Angka dengan panjang tertentu (10–15 digit)
function numerikBatas($data){
    return preg_match("/^[0-9]{10,15}$/", $data);
}

// Huruf/angka/spasi minimal 15 karakter (untuk alamat)
function alfanumerikBatas($data){
    return preg_match("/^[a-zA-Z0-9\s]{15,}$/", $data);
}

// Email dengan huruf, angka, titik, dan @
function email($data) {
    return filter_var($data, FILTER_VALIDATE_EMAIL);
}
?>
