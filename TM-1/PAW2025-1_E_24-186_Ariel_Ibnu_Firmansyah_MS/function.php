<?php
function buatTabel($batas, $aturan, $warna) {
    echo "<table class='tabel'>";

    echo "<tr><th></th>";
    for ($kolom = 1; $kolom <= $batas; $kolom++) {
        echo "<th>$kolom</th>";
    }
    echo "</tr>";

    for ($baris = 1; $baris <= $batas; $baris++) {
        echo "<tr><th>$baris</th>";
        for ($kolom = 1; $kolom <= $batas; $kolom++) {
            $hasil = $baris % $kolom;
            $cell = "<td>$hasil</td>";

            switch ($aturan) {
                case "kubik":
                    if (round(pow($hasil, 1/3)) ** 3 == $hasil) {
                        $cell = "<td class='$warna'>$hasil</td>";
                    }
                    break;

                case "border":
                    if ($baris == 1 || $baris == $batas || $kolom == 1 || $kolom == $batas) {
                        $cell = "<td class='$warna'>$hasil</td>";
                    }
                    break;

                case "prima":
                    if (isPrime($hasil)) {
                        $cell = "<td class='$warna'>$hasil</td>";
                    }
                    break;

                case "diagonal":
                    if ($baris == $kolom) {
                        $cell = "<td class='$warna'>$hasil</td>";
                    }
                    break;
            }

            echo $cell;
        }
        echo "</tr>";
    }

    echo "</table>";
}

function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
?>
