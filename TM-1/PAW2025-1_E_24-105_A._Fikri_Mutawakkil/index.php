<?php
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>TM1 - Tabel Pangkat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tugas Mingguan 1 - Tabel Pangkat</h2>
    <form method="post">
        <label for="batas">Batas ukuran tabel:</label>
        <input type="number" name="batas" id="batas" required><br><br>

        <label for="aturan">Aturan filter:</label>
        <select name="aturan" id="aturan">
            <option value="kuadrat">Bilangan Kuadrat</option>
            <option value="catur">Pola Papan Catur</option>
            <option value="komposit">Bilangan Komposit</option>
            <option value="diagonal">Pola Diagonal</option>
        </select><br><br>

        <label for="warna">Warna filter:</label>
        <select name="warna" id="warna">
            <option value="red">Merah</option>
            <option value="green">Hijau</option>
            <option value="blue">Biru</option>
        </select><br><br>

        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $batas = (int) $_POST['batas'];
        $aturan = $_POST['aturan'];
        $warna  = $_POST['warna'];

        buatTabelPangkat($batas, $aturan, $warna);
    }
    ?>
</body>
</html>
