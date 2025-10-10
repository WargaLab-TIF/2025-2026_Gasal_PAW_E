<?php
// functions.php
// berisi fungsi-fungsi validasi sederhana

function esc($data) {
    return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}

function cekKosong($isi, $namaField) {
    if (trim($isi) == "") {
        return "$namaField wajib diisi!";
    }
    return "";
}

function cekAlfabet($isi, $namaField) {
    if (!preg_match("/^[a-zA-Z ]+$/", $isi)) {
        return "$namaField hanya boleh huruf dan spasi!";
    }
    return "";
}

function cekAngka($isi, $namaField) {
    if (!preg_match("/^[0-9]+$/", $isi)) {
        return "$namaField hanya boleh angka!";
    }
    return "";
}

function cekAlfanumerik($isi, $namaField) {
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $isi)) {
        return "$namaField hanya boleh huruf, angka, dan spasi!";
    }
    return "";
}

function cekPanjang($isi, $namaField, $min, $max) {
    $len = strlen($isi);
    if ($len < $min || $len > $max) {
        return "$namaField harus antara $min sampai $max karakter!";
    }
    return "";
}
?>
