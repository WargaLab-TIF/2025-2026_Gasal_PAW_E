<?php
function tampilkanTabelModulus($batas, $aturan, $warna) {
    echo "<table>";
    echo "<tr><th></th>";

    // Header kolom
    for ($i = 1; $i <= $batas; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    // Baris tabel
    for ($i = 1; $i <= $batas; $i++) {
        echo "<tr><th>$i</th>";

        for ($j = 1; $j <= $batas; $j++) {
            $nilai = $i % $j;
            $style = "";

            switch ($aturan) {
                case "kubik":
                    for ($x = 0; $x <= $nilai; $x++) {
                        if ($x * $x * $x == $nilai) {
                            $style = $warna;
                            break;
                        }
                    }
                    break;

                case "perbatasan":
                    if ($i == 1 || $i == $batas || $j == 1 || $j == $batas) {
                        $style = $warna;
                    }
                    break;

                case "prima":
                    if ($nilai < 2) {
                        $prima = false;
                    } else {
                        $prima = true;
                        for ($k = 2; $k < $nilai; $k++) { // cukup dari 2 sampai n-1
                            if ($nilai % $k == 0) {
                                $prima = false;
                                break;
                            }
                        }
                    }
                    if ($prima) {
                        $style = $warna;
                    }
                    break;

                case "diagonal":
                    if ($i == $j) {
                        $style = $warna;
                    }
                    break;
            }

            echo "<td class='$style'>$nilai</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}
?>
