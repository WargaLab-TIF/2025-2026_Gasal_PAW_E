<?php
function isPrima($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function tampilkanTabel($batas, $aturan, $warna) {
    echo "<table>";

    // Heading kolom (baris pertama)
    echo "<tr><th></th>"; // sudut kiri atas kosong
    for ($j = 1; $j <= $batas; $j++) {
        echo "<th>$j</th>";
    }
    echo "</tr>";

    // Isi tabel dengan heading baris
    for ($i = 1; $i <= $batas; $i++) {
        echo "<tr>";
        echo "<th>$i</th>"; // heading kiri

        for ($j = 1; $j <= $batas; $j++) {
            $nilai = $i % $j;
            $class = "";

            switch ($aturan) {
                case "kubik":
                    if (round(pow(round(pow($nilai, 1/3)), 3)) == $nilai) {
                        $class = $warna;
                    }
                    break;
                case "perbatasan":
                    if ($i == 1 || $i == $batas || $j == 1 || $j == $batas) {
                        $class = $warna;
                    }
                    break;
                case "prima":
                    if (isPrima($nilai)) {
                        $class = $warna;
                    }
                    break;
                case "diagonal":
                    if ($i == $j) {
                        $class = $warna;
                    }
                    break;
            }

            echo "<td class='$class'>$nilai</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}