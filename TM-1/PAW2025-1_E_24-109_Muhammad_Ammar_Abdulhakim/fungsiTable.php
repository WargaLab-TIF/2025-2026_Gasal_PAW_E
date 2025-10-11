<?php

function hasilTable($batas, $aturan, $warna) {
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
            $value = pow($baris, $kolom);
            $style = "";

            if ($aturan == "kuadrat" && cekKuadrat($value)) {
                $style = "background-color:$warna;";
            }
            if ($aturan == "catur" && ($baris + $kolom) % 2 == 0) {
                $style = "background-color:$warna;";
            } 
            if ($aturan == "komposit" && cekKomposit($value)) {
                $style = "background-color:$warna;";
            }
            if ($aturan == "diagonal" && ($baris + $kolom) == ($batas + 1)) {
                $style = "background-color:$warna;";
            }
            echo "<td style='$style'>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function cekKuadrat($num) {
    $sqrt = sqrt($num);
    return ($sqrt == floor($sqrt));
}

function cekKomposit($num) {
    if ($num <= 3) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) 
            return true;
    }
    return false;
}
?>
