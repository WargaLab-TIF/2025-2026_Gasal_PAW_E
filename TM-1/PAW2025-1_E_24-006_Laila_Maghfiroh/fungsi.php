<?php
function HitungPrima(int $n): bool {
    if ($n < 2) {
        return false;
    }
    if ($n === 2) {
        return true;
    }
    if ($n % 2 === 0) {
        return false;
    }

    $batas = (int) sqrt($n);
    for ($i = 3; $i <= $batas; $i += 2) {

        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}

function HitungKubik(int $n): bool {
    if ($n < 0) {
        return false;
    }
    $r = (int) round(pow($n, 1/3));
    return $r * $r * $r === $n;
}


function TampilanTabelModulus($ukuran, $aturan, $warna): string {
    $html  = "<table>";

    $html .= "<tr><th></th>";
    for ($kolom = 1; $kolom <= $ukuran; $kolom++) {
        $html .= "<th>{$kolom}</th>";
    }
    $html .= "</tr>";


    for ($baris = 1; $baris <= $ukuran; $baris++) {
        $html .= "<tr>";
        $html .= "<th>{$baris}</th>";


        for ($kolom = 1; $kolom <= $ukuran; $kolom++) {
            $hasil = $baris % $kolom;

            $highlight = false;
            if ($aturan === 'kubik' && HitungKubik($hasil)) {
                $highlight = true;
            } elseif ($aturan === 'perbatasan' && ($baris === 1 || $baris === $ukuran || $kolom === 1 || $kolom === $ukuran)) {
                $highlight = true;
            } elseif ($aturan === 'prima' && HitungPrima($hasil)) {
                $highlight = true;
            } elseif ($aturan === 'diagonal' && $baris === $kolom) {
                $highlight = true;
            }

            if ($highlight) {
                $style = " style='background-color:$warna;'";
            } else {
                $style = "";
            }
            $html .= "<td$style>$hasil</td>";

        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
