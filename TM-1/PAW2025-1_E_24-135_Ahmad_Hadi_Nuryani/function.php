<?php

function isPrima($n){
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function isKomposit($n){
    return $n > 1 && !isPrima($n);
}

function displayTable($ukuran, $aturan, $warna){

    $html = "<table class='tbl'>";
    $html .= "<tr><th></th>";
    for ($i = 1; $i <= $ukuran; $i++) {
        $html .= "<th>$i</th>";
    }
    $html .= "</tr>";
    $temp = true;
    for ($baris = 1; $baris <= $ukuran; $baris++) {
        $html .= "<tr>";
        $html .= "<th>$baris</th>";
        for ($kolom = 1; $kolom <= $ukuran; $kolom++) {
            $value = $baris ** $kolom;
            $cell = "<td>$value</td>";
            if ($aturan == 'bilangan_kuadrat') {
                if (sqrt($value) == floor(sqrt($value))) {
                    $cell = "<td class='$warna'>$value</td>";
                }
            } elseif ($aturan == 'pola_papan_catur') {
                if (($baris + $kolom) % 2 == 0) {
                    $cell = "<td class='$warna'>$value</td>";
                }
            } elseif ($aturan == 'bilangan_komposit') {
                if (isKomposit($value)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
            } elseif ($aturan == 'arsiran_diagonal') {
                if (($baris + $kolom) == ($ukuran + 1)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
            } elseif ($aturan == 'bistop_move') {
                if (($baris + $kolom) == ($ukuran + 1)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($value == $kolom ** $kolom) {
                    $cell = "<td class='$warna'>$value</td>";
                }
            } elseif ($aturan == 'rock_move') {
                if ($baris == ceil($ukuran / 2)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($kolom == ceil($ukuran / 2)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($ukuran % 2 == 0) {
                    if ($baris == round($ukuran / 2) + 1) {
                        $cell = "<td class='$warna'>$value</td>";
                    }
                    if ($kolom == round($ukuran / 2) + 1) {
                        $cell = "<td class='$warna'>$value</td>";
                    }
                }
            } elseif ($aturan == 'queen_move') {
                if (($baris + $kolom) == ($ukuran + 1)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($value == $kolom ** $kolom) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($baris == ceil($ukuran / 2)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($kolom == ceil($ukuran / 2)) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($ukuran % 2 == 0) {
                    if ($baris == round($ukuran / 2) + 1) {
                        $cell = "<td class='$warna'>$value</td>";
                    }
                    if ($kolom == round($ukuran / 2) + 1) {
                        $cell = "<td class='$warna'>$value</td>";
                    }
                }
            } elseif ($aturan == "snake") {
                if ($baris % 2  == $ukuran % 2) {
                    $cell = "<td class='$warna'>$value</td>";
                }
                if ($kolom == $ukuran && ($ukuran % 2 != 0 ? $baris % 2 == 0 : $baris % 2 != 0)) {
                    if ($temp) {
                        $cell = "<td class='$warna'>$value</td>";
                        $temp = false;
                    } else {
                        $temp = true;
                    }
                }
                if ($kolom == 1) {
                    if ($temp) {
                        $cell = "<td class='$warna'>$value</td>";
                        $temp = false;
                    } else {
                        $temp = true;
                    }
                }
            }
            $html .= $cell;
        }
        $html .= "</tr>";
    }

    $html .= "</table>";
    echo $html;
}
