<?php
require "fungsi.php";

$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 5;
$filterRule = isset($_POST['filter']) ? $_POST['filter'] : "none";
$filterColor = isset($_POST['color']) ? $_POST['color'] : "yellow";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Pangkat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Generator Tabel Pangkat</h2>
    <form method="post">
        <label for="limit">Batas Ukuran:</label>
        <input type="number" id="limit" name="limit" value="<?= $limit ?>" required><br>


        <label for="filter">Aturan Filter:</label>
        <select id="filter" name="filter">
            <option value="none" <?= ($filterRule=="none" ? "selected" : "") ?>>Tanpa Filter</option>
            <option value="kuadrat" <?= ($filterRule=="kuadrat" ? "selected" : "") ?>>Bilangan Kuadrat</option>
            <option value="catur" <?= ($filterRule=="catur" ? "selected" : "") ?>>Pola Papan Catur</option>
            <option value="komposit" <?= ($filterRule=="komposit" ? "selected" : "") ?>>Bilangan Komposit</option>
            <option value="diagonal" <?= ($filterRule=="diagonal" ? "selected" : "") ?>>Arsiran Diagonal</option>
        </select><br>

        <label for="color">Warna:</label>
        <select id="color" name="color">
            <option value="yellow" <?= ($filterColor=="yellow" ? "selected" : "") ?>>Kuning</option>
            <option value="lightblue" <?= ($filterColor=="lightblue" ? "selected" : "") ?>>Biru Muda</option>
            <option value="lightgreen" <?= ($filterColor=="lightgreen" ? "selected" : "") ?>>Hijau Muda</option>
        </select><br>


        <input type="submit" value="Tampilkan Tabel">
    </form>

    <?php
    if ($limit > 0) {
        buatTabelPangkat($limit, $filterRule, $filterColor);
    }
    ?>
</body>
</html>
