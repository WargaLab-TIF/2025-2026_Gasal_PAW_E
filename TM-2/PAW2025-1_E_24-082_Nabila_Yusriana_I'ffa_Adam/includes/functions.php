<?php
function sticky($name) {
    return htmlspecialchars($_POST[$name] ?? '', ENT_QUOTES, 'UTF-8');
}
function add_error(&$errors, $field, $message) {
    $errors[$field][] = $message;
}
function is_required($value) {
    return trim($value) !== '';
}
function is_alpha($value) {
    return preg_match('/^[A-Za-z ]+$/u', $value) === 1;
}
function is_numeric_str($value) {
    return preg_match('/^[0-9]+$/', $value) === 1;
}
function is_alnum($value) {
    return preg_match('/^[A-Za-z0-9]+$/u', $value) === 1;
}
function has_digit_length($value, $exact = null, $min = null, $max = null) {
    $len = strlen(preg_replace('/\D/', '', $value));
    if ($exact !== null) return $len === $exact;
    if ($min !== null && $len < $min) return false;
    if ($max !== null && $len > $max) return false;
    return true;
}
function has_char_length($value, $min = null, $max = null) {
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
