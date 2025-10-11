<?php
function prima($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function tabel($batas, $aturan, $warna) {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";

    echo "<tr><th></th>";
    for ($i = 1; $i <= $batas; $i++) {
        echo "<th><b>$i</b></th>";
    }
    echo "</tr>";

    for ($baris = 1; $baris <= $batas; $baris++) {
        echo "<tr>";
        echo "<th><b>$baris</b></th>";
        for ($kolom = 1; $kolom <= $batas; $kolom++) {
            $nilai = pow($baris, $kolom); 
            $style = "";

            switch($aturan) {
                case "kuadrat":
                    if (sqrt($nilai) == floor(sqrt($nilai))) {
                        $style = "background-color:$warna;";
                    }
                    break;
                case "catur":
                    if (($baris + $kolom) % 2 == 0) {
                        $style = "background-color:$warna;";
                    }
                    break;
                case "komposit":
                    if ($nilai > 3 && !prima($nilai)) {
                        $style = "background-color:$warna;";
                    }
                    break;
                case "diagonal":
                    if ($baris == $kolom) {
                        $style = "background-color:$warna;";
                    }
                    break;
            }

            echo "<td style='$style'>$nilai</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

$batas = isset($_POST['batas']) ? $_POST['batas'] : '';
$aturan = isset($_POST['aturan']) ? $_POST['aturan'] : '';
$warna = isset($_POST['warna']) ? $_POST['warna'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pangkat</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; margin: 20px auto; }
        th, td { padding: 8px 12px; text-align: center; }
        th { background: #eee; }
        form { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h2 align="center">Tabel Pangkat (Tema NIM Ganjil)</h2>
    <form method="post">
        Batas ukuran: 
        <input type="number" name="batas" required value="<?= htmlspecialchars($batas) ?>"><br><br>

        Aturan Filter:
        <select name="aturan">
            <option value="kuadrat" <?= $aturan=='kuadrat'?'selected':'' ?>>Bilangan Kuadrat</option>
            <option value="catur" <?= $aturan=='catur'?'selected':'' ?>>Pola Papan Catur</option>
            <option value="komposit" <?= $aturan=='komposit'?'selected':'' ?>>Bilangan Komposit</option>
            <option value="diagonal" <?= $aturan=='diagonal'?'selected':'' ?>>Arsiran Diagonal</option>
        </select><br><br>

        Warna Filter:
        <select name="warna">
            <option value="lightblue" <?= $warna=='lightblue'?'selected':'' ?>>Biru</option>
            <option value="lightgreen" <?= $warna=='lightgreen'?'selected':'' ?>>Hijau</option>
            <option value="lightcoral" <?= $warna=='lightcoral'?'selected':'' ?>>Merah</option>
        </select><br><br>

        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        tabel($batas, $aturan, $warna);
    }
    ?>
</body>
</html>
