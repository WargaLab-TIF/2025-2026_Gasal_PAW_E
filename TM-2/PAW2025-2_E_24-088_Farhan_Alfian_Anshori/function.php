<?php

function validasiNama($nama) {
    return preg_match("/^[a-zA-Z\s']*$/", $nama);
}

function validasiNip($nip) {
    return preg_match("/^[0-9]{8}$/", $nip);
}

function validasiAlamat($alamat) {
    return preg_match("/^[a-zA-Z0-9\s,.-\/]*$/", $alamat);
}

function validasiTelefon($telefon) {
    return preg_match("/^[0-9]{10,13}$/", $telefon);
}

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validasiGaji($gaji) {
    return is_numeric($gaji);
}

function validasiJabatan($jabatan) {
    return preg_match("/^[a-zA-Z\s]{2,}$/", $jabatan);
}

?>