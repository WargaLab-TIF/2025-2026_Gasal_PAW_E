<?php
// Ambil nilai input 
function sticky($name) {
    return htmlspecialchars($_POST[$name] ?? '', ENT_QUOTES, 'UTF-8');
}
// pesan error 
function add_error(&$errors, $field, $message) {
    $errors[$field][] = $message;
}
// wajib diisi
function is_required($value) {
    return trim($value) !== '';
}
// Hanya huruf dan spasi
function is_alpha($value) {
    return preg_match('/^[A-Za-z ]+$/u', $value) === 1;
}
// Hanya angka 0-9
function is_numeric_str($value) {
    return preg_match('/^[0-9]+$/', $value) === 1;
}
// Huruf dan angka saja
function is_alnum($value) {
    return preg_match('/^[A-Za-z0-9]+$/u', $value) === 1;
}
// Cek jumlah digit (abaikan karakter non-angka)
function has_digit_length($value, $exact = null, $min = null, $max = null) {
    $len = strlen(preg_replace('/\D/', '', $value));
    if ($exact !== null) return $len === $exact;
    if ($min !== null && $len < $min) return false;
    if ($max !== null && $len > $max) return false;
    return true;
}
// Cek panjang karakter
function has_char_length($value, $min = null, $max = null) {
    // Pakai mb_strlen kalau tersedia; jika tidak, pakai strlen
    if (function_exists('mb_strlen')) {
        $len = mb_strlen($value, 'UTF-8');
    } else {
        $len = strlen($value);
    }
    if ($min !== null && $len < $min) return false;
    if ($max !== null && $len > $max) return false;
    return true;
}
?>
