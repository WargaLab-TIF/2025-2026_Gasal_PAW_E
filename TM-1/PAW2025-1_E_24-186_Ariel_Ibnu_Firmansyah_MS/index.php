<?php
include "function.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas PAW - TM1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tabel Modulus</h2>

    <form method="post">
        <label>Batas ukuran: </label>
        <input type="number" name="batas">

        <label>Aturan: </label>
        <select name="aturan">
            <option value="kubik">Bilangan Kubik</option>
            <option value="border">Perbatasan</option>
            <option value="prima">Bilangan Prima</option>
            <option value="diagonal">Diagonal</option>
        </select>

        <label>Warna: </label>
        <select name="warna">
            <option value="biru">Biru</option>
            <option value="hijau">Hijau</option>
            <option value="merah">Merah</option>
        </select>

        <button type="submit">Tampilkan</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $batas  = $_POST["batas"];
        $aturan = $_POST["aturan"];
        $warna  = $_POST["warna"];

        buatTabel($batas, $aturan, $warna);
    }
    ?>
</body>
</html>
