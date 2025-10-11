<?php
function buatTabelModulus($ukuran, $aturan, $warna) {
    echo "<table>";
    echo "<thead><tr><th></th>";
    for ($i = 1; $i <= $ukuran; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    for ($baris = 1; $baris <= $ukuran; $baris++) {
        echo "<tr>";
        echo "<th>$baris</th>";
        for ($kolom = 1; $kolom <= $ukuran; $kolom++) {
            $nilai = $baris % $kolom;
            $pil_warna = '';

            switch ($aturan) {
                case 'kubik':
                    if ($nilai >= 0) {
                        $akar = round(pow($nilai, 1/3));
                        if ($akar * $akar * $akar == $nilai) {
                            $pil_warna = $warna;
                        }
                    }
                    break;
                case 'perbatasan':
                    if ($baris == 1 || $baris == $ukuran || $kolom == 1 || $kolom == $ukuran) {
                        $pil_warna = $warna;
                    }
                    break;
                case 'prima':
                    $prima = true;
                    if ($nilai <= 1) {
                        $prima = false;
                    } else {
                        for ($i = 2; $i * $i <= $nilai; $i++) {
                            if ($nilai % $i == 0) {
                                $prima = false;
                                break;
                            }
                        }
                    }
                    if ($prima) {
                        $pil_warna = $warna;
                    }
                    break;
                case 'diagonal_kiri_atas':
                    if ($baris == $kolom) {
                         $pil_warna = $warna;
                    }
                    break;
            }
            
            echo "<td class='$pil_warna'>$nilai</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
?>