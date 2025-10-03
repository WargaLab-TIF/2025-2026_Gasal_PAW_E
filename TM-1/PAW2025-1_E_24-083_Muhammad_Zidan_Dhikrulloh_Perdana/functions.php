<?php 
function buatTabel($ukuran, $aturan, $warna){ 
    echo "<table class='center'>";
    // header kolom
    echo "<tr><th></th>";
    for ($i=1; $i <= $ukuran ; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    // isi tabel
    for ($j=1; $j <= $ukuran ; $j++) {
        echo "<tr>";
        echo "<th>$j</th>";

        for ($k=1; $k <= $ukuran ; $k++) {
            $hasil = $j ** $k;
            $isi = "<td>$hasil</td>";

            // aturan pertama: bilangan kuadrat
            if ($aturan == "pertama") {
                $akar = sqrt($hasil);
                if ($akar == floor($akar)) {
                    $isi = "<td style='background-color:$warna;'>$hasil</td>";
                }
            }

            // aturan kedua: papan catur
            if ($aturan == "kedua") {
                if (($j + $k) % 2 == 0) {
                    $isi = "<td style='background-color:$warna;'>$hasil</td>";
                }
            }

            // aturan ketiga: bilangan komposit
            if ($aturan == "ketiga") {
                $faktor = 0;
                for ($x=1; $x <= $hasil; $x++) {
                    if ($hasil % $x == 0) $faktor++;
                    if ($faktor > 2) break;
                }
                if ($faktor > 2) {
                    $isi = "<td style='background-color:$warna;'>$hasil</td>";
                }
            }

            // aturan keempat: arsiran diagonal
            if ($aturan == "keempat") {
                if ($k == ($ukuran - $j + 1)) {
                    $isi = "<td style='background-color:$warna;'>$hasil</td>";
                }
            }

            echo $isi;
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
