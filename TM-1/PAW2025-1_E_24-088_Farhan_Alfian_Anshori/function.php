<?php
function generateTable($limit, $filterRule, $filterColor) {
    echo "<table>";

    // Header baris (atas)
    echo "<tr><th></th>";
    for ($col = 1; $col <= $limit; $col++) {
        echo "<th>$col</th>";
    }
    echo "</tr>";

    // Isi tabel modulus
    for ($row = 1; $row <= $limit; $row++) {
        echo "<tr><th>$row</th>";
        for ($col = 1; $col <= $limit; $col++) {
            $value = $row % $col;
            $class = "";

            // Filter sesuai aturan
            switch ($filterRule) {
                case "kubik":
                    if (round(pow($value, 1/3)) ** 3 == $value) {
                        $class = "highlight";
                    }
                    break;

                case "border":
                    if ($row == 1 || $row == $limit || $col == 1 || $col == $limit) {
                        $class = "highlight";
                    }
                    break;

                case "prima":
                    if (isPrime($value)) {
                        $class = "highlight";
                    }
                    break;

                case "diagonal":
                    if ($row == $col) {
                        $class = "highlight";
                    }
                    break;
            }

            echo "<td class='$class' style='--color:$filterColor'>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

// Fungsi cek bilangan prima
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
?>