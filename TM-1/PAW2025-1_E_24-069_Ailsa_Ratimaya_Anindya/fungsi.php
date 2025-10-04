<?php
function buatTabelPangkat($limit, $filterRule, $filterColor) {
    echo "<table>";

    // Header kolom
    echo "<tr><th>*</th>";
    for ($j = 1; $j <= $limit; $j++) {
        echo "<th>$j</th>";
    }
    echo "</tr>";

    // Isi tabel
    for ($i = 1; $i <= $limit; $i++) {
        echo "<tr>";
        echo "<th>$i</th>";

        for ($j = 1; $j <= $limit; $j++) {
            $val = pow($i, $j);
            $class = "";

            // Tentukan aturan filter
            if ($filterRule === "kuadrat" && isPerfectSquare($val)) {
                $class = "style='background-color:$filterColor'";
            } elseif ($filterRule === "catur" && (($i + $j) % 2 == 0)) {
                $class = "style='background-color:$filterColor'";
            } elseif ($filterRule === "komposit" && isComposite($val)) {
                $class = "style='background-color:$filterColor'";
            } elseif ($filterRule === "diagonal" && ($i + $j) === ($limit + 1)) {
                // diagonal kanan atas ke kiri bawah
                $class = "style='background-color:$filterColor'";
            }

            echo "<td $class>$val</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

// Cek bilangan kuadrat
function isPerfectSquare($n) {
    $root = (int)sqrt($n);
    return $root * $root == $n;
}

// Cek bilangan komposit
function isComposite($n) {
    if ($n < 4) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) return true;
    }
    return false;
}
?>
