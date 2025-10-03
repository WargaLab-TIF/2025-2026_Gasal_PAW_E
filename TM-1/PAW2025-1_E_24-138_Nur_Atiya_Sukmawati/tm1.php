<?php
/**
 * =======================================================
 * FUNGSI-FUNGSI UTAMA DAN PEMBANTU
 * =======================================================
 */

// Fungsi Pembantu 1: Cek Bilangan Kubik Sempurna (0 dan 1 termasuk)
function isPerfectCube($n) {
    // Memastikan input adalah integer non-negatif
    $n = (int) $n;
    if ($n < 0) return false;
    if ($n == 0 || $n == 1) return true;
    
    // Menggunakan round(pow(n, 1/3)) untuk menghindari floating point issues
    $root = round(pow($n, 1/3));
    return ($root * $root * $root) === $n;
}

// Fungsi Pembantu 2: Cek Bilangan Prima
function isPrime($n) {
    $n = (int) $n;
    if ($n <= 1) return false; 
    if ($n <= 3) return true; 

    // Optimasi loop untuk cek bilangan prima
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

/**
 * Menentukan KELAS CSS sel berdasarkan HANYA satu ATURAN yang dipilih.
 */
function getCellClass($value, $r, $c, $maxRow, $maxCol, $color, $filterRule) {
    if (empty($color)) return '';
    
    // Status Pengecekan
    $isKubik = isPerfectCube($value);
    $isPrima = isPrime($value);
    $isDiagonal = ($r === $c);
    $isAtBorder = ($r === 1 || $r === $maxRow || $c === 1 || $c === $maxCol);

    $cellClass = '';

    // Logika Filter NIM Genap
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
    
    // Menggabungkan kelas umum dan kelas warna jika filter aktif
    if ($cellClass !== '') {
        return $cellClass . ' ' . $color;
    }
    
    return ''; 
}

/**
 * FUNGSI UTAMA UNTUK MENAMPILKAN TABEL MODULUS ($r % $c)
 */
function createModulusTable($size, $color, $colorName, $filterRule, $ruleName) {
    $rows = (int) $size; 
    $cols = (int) $size;

    $html = "<h2 class='table-title'>Tabel Modulus {$size}x{$size} (Filter: {$ruleName} | Warna: {$colorName})</h2>\n";
    $html .= "<table>\n";

    // Header Kolom
    $html .= "<thead>\n<tr>\n";
    $html .= "<th>Baris \\ Kolom</th>\n"; 
    for ($c = 1; $c <= $cols; $c++) {
        $html .= "<th>$c</th>\n";
    }
    $html .= "</tr>\n</thead>\n";

    // Isi Tabel
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