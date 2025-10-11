<?php
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function is_required($data) {
    return trim($data) === ''; 
}

function is_alpha($data) {
    return preg_match('/^[a-zA-Z\s]+$/', $data); 
}

function is_numeric_only($data) {
    return ctype_digit($data);
}

function is_alphanumeric_only($data) {
    return preg_match('/^[a-zA-Z0-9]+$/', $data); 
}

function check_numeric_length($data, $min_length, $max_length = null) {
    if (!is_numeric_only($data)) {
        return false; 
    }
    
    $len = strlen($data);
    
    if ($max_length === null) {
        return $len === $min_length;
    }
    return $len >= $min_length && $len <= $max_length;
}

function check_char_range($data, $min_length, $max_length) {
    $len = mb_strlen($data, 'UTF-8'); 
    return $len >= $min_length && $len <= $max_length;
}

?>