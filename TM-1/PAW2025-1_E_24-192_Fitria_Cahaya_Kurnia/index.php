<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Modulus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <div class="pcc">
        <fieldset>
        <div class="box">
        <label>Batas Ukuran: </label>
        <input type="number" name="batas">
        </div>

        <div class="box">
        <label for="aturan">Aturan Filter Tampilan: </label>
        <select name="aturan" id="aturan">
            <option value="">[Choose your rules: ]</option>
            <option value="1">1. Bilangan Kubik</option>
            <option value="2">2. Pola Perbatasan</option>
            <option value="3">3. Bilangan Prima</option>
            <option value="4">4. Arsiran Diagonal (kiri atas ke kanan bawah)</option>
        </select>
        </div>

        <div class="box">
        <label for="warna">Warna Filter Tampilan: </label>
        <select name="warna" id="warna">
            <option value="">[Choose your color]</option>
            <option value="red">Merah</option>
            <option value="blue">Biru</option>
            <option value="green">Hijau</option>
        </select>
        </div>

        <div class="box">
        <button type="submit" name="submit" value="Submit">Submit</button>
        </div>
        </fieldset>
        </div>
    </form>
    <div class="pcc">
    <?php 
    if (isset($_POST['submit'])) {
        $batas = $_POST["batas"];
        $aturan = $_POST["aturan"];
        $warna = $_POST["warna"];

        require_once 'bbb.php';
        Maketab($batas, $aturan, $warna);
    }
    ?></div>
</body>
</html>
