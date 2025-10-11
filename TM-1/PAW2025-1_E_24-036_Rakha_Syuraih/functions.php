
<?php
function isPrima($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

function isKubik($n) {
    $akar = round(pow($n, 1/3));
    return ($akar * $akar * $akar == $n);
}

function buatTabelModulus($batas, $aturan, $warna) {
    echo "<table>";
    echo "<thead><tr><th></th>";
    for ($j = 1; $j <= $batas; $j++) {
        echo "<th>$j</th>";
    }
    echo "</tr></thead><tbody>";

    for ($i = 1; $i <= $batas; $i++) {
        echo "<tr>";
        echo "<th>$i</th>"; 
        for ($j = 1; $j <= $batas; $j++) {
            $nilai = $i % $j;
            $style = "";

            switch ($aturan) {
                case "kubik":
                    if (isKubik($nilai)) $style = "background:$warna;";
                    break;
                case "border":
                    if ($i == 1 || $i == $batas || $j == 1 || $j == $batas) {
                        $style = "background:$warna;";
                    }
                    break;
                case "prima":
                    if (isPrima($nilai)) $style = "background:$warna;";
                    break;
                case "diagonal":
                    if ($i == $j) $style = "background:$warna;";
                    break;
            }
            echo "<td style='$style'>$nilai</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}
