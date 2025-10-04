<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Modulus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">
    <label>Batas Ukuran: </label>
    <input type="number" name="batas" min="1" required>
    <br><br>

    <label>Aturan Filter:</label>
    <select name="aturan">
        <option value="kubik">Bilangan Kubik</option>
        <option value="perbatasan">Perbatasan</option>
        <option value="prima">Bilangan Prima</option>
        <option value="diagonal">Diagonal Kiri-Atas ke Kanan-Bawah</option>
    </select>
    <br><br>

    <label>Warna:</label>
    <select name="warna">
        <option value="red">Merah</option>
        <option value="green">Hijau</option>
        <option value="blue">Biru</option>
    </select>
    <br><br>

    <input type="submit" name="submit" value="Tampilkan Tabel">
</form>

<?php
if (isset($_POST['submit'])) {
    require_once "fungsi.php";
    $batas = $_POST['batas'];
    $aturan = $_POST['aturan'];
    $warna = $_POST['warna'];

    tampilkanTabel($batas, $aturan, $warna);
}
?>

</body>
</html>
