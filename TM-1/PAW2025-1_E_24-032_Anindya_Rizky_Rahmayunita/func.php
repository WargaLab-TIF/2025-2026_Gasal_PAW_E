<?php
/**
 * Cek apakah bilangan adalah bilangan prima
 * @param int $n Bilangan yang akan dicek.
 * @return bool True jika prima, False jika tidak.
 */
function isPrima($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) { 
        if ($n % $i == 0) return false;
    }
    return true;
}

/**
 * Menampilkan tabel modulus dengan pewarnaan berdasarkan aturan
 * @param int $batas Batas maksimum baris dan kolom.
 * @param string $aturan Aturan pewarnaan (kubik, perbatasan, prima, diagonal).
 * @param string $warna Warna yang digunakan (merah, hijau, biru).
 */
function tampilkanTabelModulus($batas, $aturan, $warna) {
    // Dipastikan class warna selalu terbentuk, cth: "warna-merah"
    $class_warna = "warna-" . strtolower($warna); 

    echo "<h3>Tabel Modulus 1 s/d $batas</h3>";
    echo "<div class='table-container'>"; 
    echo "<table class='modulus'>";
    
    // Header Kolom
    echo "<thead><tr><th>*</th>";
    for ($col = 1; $col <= $batas; $col++) {
        echo "<th>$col</th>";
    }
    echo "</tr></thead>";

    // Isi Tabel
    echo "<tbody>";
    for ($row = 1; $row <= $batas; $row++) {
        echo "<tr>";
        echo "<th>$row</th>";
        for ($col = 1; $col <= $batas; $col++) {
            $hasil = $row % $col; 
            $class = "";

            // Logika Pewarnaan (Filter)
            switch ($aturan) {
                case "kubik":
                    $akarKubik = round(pow($hasil, 1/3));
                    if ($akarKubik * $akarKubik * $akarKubik == $hasil) {
                        $class = $class_warna;
                    }
                    break;
                case "perbatasan":
                    if ($row == 1 || $row == $batas || $col == 1 || $col == $batas) {
                        $class = $class_warna;
                    }
                    break;
                case "prima":
                    if (isPrima($hasil)) {
                        $class = $class_warna;
                    }
                    break;
                case "diagonal":
                    if ($row == $col) {
                        // **PENTING: Memastikan $class_warna ditetapkan di sini**
                        $class = $class_warna; 
                    }
                    break;
            }

            echo "<td class='$class'>$hasil</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>"; 
}
?>