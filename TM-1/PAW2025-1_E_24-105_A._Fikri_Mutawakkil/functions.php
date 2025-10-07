<?php
function buatTabelPangkat($batas, $aturan, $warna) {
    echo "<table>";
   
    echo "<tr><th></th>";
    for ($i = 1; $i <= $batas; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    for ($baris = 1; $baris <= $batas; $baris++) {
        echo "<tr>";
        echo "<th>$baris</th>";

        for ($kolom = 1; $kolom <= $batas; $kolom++) {
            $nilai = pow($baris, $kolom);
            $kelas = cekFilter($nilai, $baris, $kolom, $batas, $aturan) ? "filter" : "";
            echo "<td class='$kelas' style='--warna:$warna'>$nilai</td>";
        }

        echo "</tr>";
    }
    echo "</table>";
}


function cekFilter($nilai, $baris, $kolom, $batas, $aturan) {
    switch ($aturan) {
        case "kuadrat":
            return floor(sqrt($nilai)) ** 2 == $nilai;
        case "catur":
            return ($baris + $kolom) % 2 == 0;
        case "komposit":
            return isKomposit($nilai);
        case "diagonal":
            return $baris + $kolom == $batas + 1; // 
        default:
            return false;
    }
}


function isKomposit($n) {
    if ($n < 4) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return true;
    }
    return false;
}
?>
