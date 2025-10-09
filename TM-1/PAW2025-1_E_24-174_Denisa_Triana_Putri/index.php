<?php
require_once "functions.php"; 


$defaultBatas  = 5;
$defaultAturan = "kubik";
$defaultWarna  = "lightgreen";


$batas  = isset($_POST["batas"]) ? (int) $_POST["batas"] : $defaultBatas;
$aturan = isset($_POST["aturan"]) ? $_POST["aturan"] : $defaultAturan;
$warna  = isset($_POST["warna"]) ? $_POST["warna"] : $defaultWarna;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tabel Modulus</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .color{
            background : <?= $warna?>
        }
    </style>
</head>
<body>
    <h2>Aplikasi Tabel Modulus</h2>
    <form method="post" action="">
        <label for="batas">Batas Ukuran:</label>
        <input type="number" name="batas" id="batas" min="1" 
               value="<?= $batas ?>" required><br><br>

        <label for="aturan">Aturan Filter:</label>
        <select name="aturan" id="aturan" required>
            <option value=""    <?= $aturan=="" ? "selected" : "" ?>>Pilih Filter</option>
            <option value="kubik"    <?= $aturan=="kubik" ? "selected" : "" ?>>Bilangan Kubik</option>
            <option value="border"   <?= $aturan=="border" ? "selected" : "" ?>>Pola Perbatasan</option>
            <option value="prima"    <?= $aturan=="prima" ? "selected" : "" ?>>Bilangan Prima</option>
            <option value="diagonal" <?= $aturan=="diagonal" ? "selected" : "" ?>>Pola Diagonal</option>
        </select><br><br>

        <label for="warna">Pilih Warna:</label>
        <select name="warna" id="warna" required>
            <option value="" <?= $warna=="" ? "selected" : "" ?>>Pilih Warna</option>
            <option value="lightgreen" <?= $warna=="lightgreen" ? "selected" : "" ?>>Hijau</option>
            <option value="lightblue"  <?= $warna=="lightblue" ? "selected" : "" ?>>Biru</option>
            <option value="lightcoral" <?= $warna=="lightcoral" ? "selected" : "" ?>>Merah</option>
        </select><br><br>

        <button type="submit">Tampilkan Tabel</button>
    </form>
    <div id="tabel">
    <?php
  
    buatTabelModulus($batas, $aturan, $warna);
    ?>
    </div>
</body>
</html>
