<?php
function isCubic($n) {
    if ($n < 0) {
        $cubeRoot = round(pow(abs($n), 1/3));
        return ($cubeRoot ** 3) == abs($n);
    } else {
        $cubeRoot = round(pow($n, 1/3));
        return ($cubeRoot ** 3) == $n;
    }
}


function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

function buatTabelModulus($batas, $aturan) {
    echo "<table>\n";


    echo "  <tr>\n";
    echo "    <th></th>\n";
    for ($col = 1; $col <= $batas; $col++) {
        echo "    <th>$col</th>\n";
    }
    echo "  </tr>\n";

    // Isi tabel
    for ($row = 1; $row <= $batas; $row++) {
        echo "  <tr>\n";
        echo "    <th>$row</th>\n";
        for ($col = 1; $col <= $batas; $col++) {
            $nilai = $row % $col; 
            $class = ""; // default tidak ada class

            switch ($aturan) {
                case "kubik":
                    if (isCubic($nilai)) $class = "color";
                    break;
                case "border":
                    if ($row == 1 || $row == $batas || $col == 1 || $col == $batas) {
                        $class = "color";
                    }
                    break;
                case "prima":
                    if (isPrime($nilai)) $class = "color";
                    break;
                case "diagonal":
                    if ($row == $col) $class = "color";
                    break;
            }

            $attr = $class ? " class=\"$class\"" : "";
            echo "    <td$attr>$nilai</td>\n";
        }
        echo "  </tr>\n";
    }

    echo "</table>\n";
}

?>
