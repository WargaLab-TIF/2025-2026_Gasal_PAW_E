<?php
function isPerfectCube($n) {
    $n = (int) $n;
    if ($n < 0) return false;
    if ($n == 0 || $n == 1) return true;

    $root = round(pow($n, 1/3));
    return ($root * $root * $root) === $n;
}

function isPrime($n) {
    $n = (int) $n;
    if ($n <= 1) return false; 
    if ($n <= 3) return true; 

    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function getCellClass($value, $r, $c, $maxRow, $maxCol, $color, $filterRule) {
    if (empty($color)) return '';

    $isKubik = isPerfectCube($value);
    $isPrima = isPrime($value);
    $isDiagonal = ($r === $c);
    $isAtBorder = ($r === 1 || $r === $maxRow || $c === 1 || $c === $maxCol);

    $cellClass = '';

    switch ($filterRule) {
        case 'kubik':
            if ($isKubik) $cellClass = 'filtered-cell';
            break;
        case 'perbatasan': 
            if ($isAtBorder) $cellClass = 'filtered-cell';
            break;
        case 'prima':
            if ($isPrima) $cellClass = 'filtered-cell';
            break;
        case 'diagonal':
            if ($isDiagonal) $cellClass = 'filtered-cell';
            break;
    }

    if ($cellClass !== '') {
        return $cellClass . ' ' . $color;
    }
    
    return ''; 
}

function createModulusTable($size, $color, $colorName, $filterRule, $ruleName) {
    $rows = (int) $size; 
    $cols = (int) $size;

    $html = "<h2 class='table-title'>Tabel Modulus {$size}x{$size} (Filter: {$ruleName} | Warna: {$colorName})</h2>\n";
    $html .= "<table>\n";

    $html .= "<thead>\n<tr>\n";
    $html .= "<th>Baris \\ Kolom</th>\n"; 
    for ($c = 1; $c <= $cols; $c++) {
        $html .= "<th>$c</th>\n";
    }
    $html .= "</tr>\n</thead>\n";

    $html .= "<tbody>\n";
    for ($r = 1; $r <= $rows; $r++) {
        $html .= "<tr>\n";
        $html .= "<th>$r</th>\n"; 

        for ($c = 1; $c <= $cols; $c++) {
            $value = $r % $c; 
            $cellClass = getCellClass($value, $r, $c, $rows, $cols, $color, $filterRule); 
            $html .= "<td class='{$cellClass}'>$value</td>\n";
        }
        $html .= "</tr>\n";
    }
    $html .= "</tbody>\n";
    $html .= "</table>\n";

    return $html;
}