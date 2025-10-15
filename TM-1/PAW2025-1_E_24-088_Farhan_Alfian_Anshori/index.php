<?php
include "function.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas PAW - TM1</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Tabel Modulus Genap</h2>

    <form method="post">
        <label>Batas ukuran: </label>
        <input type="number" name="limit" required min="1">

        <label>Aturan Filter: </label>
        <select name="filterRule">
            <option value="kubik">Bilangan Kubik</option>
            <option value="border">Perbatasan</option>
            <option value="prima">Bilangan Prima</option>
            <option value="diagonal">Diagonal</option>
        </select>

        <label>Warna Filter: </label>
        <select name="filterColor">
            <option value="red">Merah</option>
            <option value="yellow">Kuning</option>
            <option value="green">Hijau</option>
        </select>

        <button type="submit">Tampilkan</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $limit = $_POST["limit"];
        $filterRule = $_POST["filterRule"];
        $filterColor = $_POST["filterColor"];

        generateTable($limit, $filterRule, $filterColor);
    }
    ?>
</body>
</html>