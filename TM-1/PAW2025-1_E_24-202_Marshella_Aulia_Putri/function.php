<?php
// Cek bilangan prima
function isPrima($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

// Cek bilangan kubik
function isKubik($n) {
    if ($n == 0) return true; // 0 dianggap kubik
    if ($n < 1) return false;
    $i = 1;
    while ($i * $i * $i <= $n) {
        if ($i * $i * $i == $n) return true;
        $i++;
    }
    return false;
}

// Buat tabel modulus
function buatTabelModulus($ukuran, $aturan, $warna) {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";

    // header kolom
    echo "<tr><th></th>";
    for ($c = 1; $c <= $ukuran; $c++) {
        echo "<th>$c</th>";
    }
    echo "</tr>";

    // body tabel
    for ($r = 1; $r <= $ukuran; $r++) {
        echo "<tr>";
        echo "<th>$r</th>";

        for ($c = 1; $c <= $ukuran; $c++) {
            $nilai = $r % $c; // MODULUS
            $style = "";

            if ($aturan == 1 && isKubik($nilai)) {
                $style = "background-color:$warna;";
            } elseif ($aturan == 2 && ($r == 1 || $r == $ukuran || $c == 1 || $c == $ukuran)) {
                $style = "background-color:$warna;";
            } elseif ($aturan == 3 && isPrima($nilai)) {
                $style = "background-color:$warna;";
            } elseif ($aturan == 4 && $r == $c) {
                $style = "background-color:$warna;";
            }

            echo "<td style='$style'>$nilai</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>
