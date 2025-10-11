<?php
function bersih($nilai) {
    return htmlspecialchars(trim((string)$nilai), ENT_QUOTES, 'UTF-8');
}

function terisi($nilai) {
    return trim((string)$nilai) !== '';
}

function huruf_spasi($nilai) {
    return preg_match("/^[\p{L} ]+$/u", $nilai);
}

function angka_saja($nilai) {
    return preg_match("/^[0-9]+$/", $nilai);
}

function alfanum($nilai) {
    return preg_match("/^[\p{L}0-9]+$/u", $nilai);
}

function panjang_ok($nilai, $min = null, $max = null) {
    $jumlah = strlen(trim((string)$nilai));

    if ($min !== null && $jumlah < $min) {
        return false;
    }

    if ($max !== null && $jumlah > $max) {
        return false;
    }

    return true;
}
