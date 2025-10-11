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
        <fieldset>
        <div class="box">
        <label>Batas Ukuran: </label>
        <input type="number" name="batas">
        </div>

        <div class="box">
        <label for="aturan">Aturan Filter Tampilan: </label>
        <select name="aturan" id="aturan">
            <option value="">[ Pilih aturan: ]</option>
            <option value="1">1. Bilangan Kubik</option>
            <option value="2">2. Pola Perbatasan</option>
            <option value="3">3. Bilangan Prima</option>
            <option value="4">4. Arsiran Diagonal (kiri atas ke kanan bawah)</option>
        </select>
        </div>

        <div class="box">
        <label for="color">Warna Filter Tampilan: </label>
        <select name="color" id="color">
            <option value="">[ Pilih warna: ]</option>
            <option value="blue">Biru</option>
            <option value="green">Hijau</option>
            <option value="red" >Merah</option>
        </select>
        </div>

        <div class="box">
        <button type="submit" name="submit" value="Submit">Submit</button>
        </div>
        </fieldset>
    </form>

    <?php 
    if (isset($_POST['submit'])) {
        $batas = $_POST["batas"];
        $aturan = $_POST["aturan"];
        $warna = $_POST["color"];

        require_once 'fungsi.php';
        Maketab($batas, $aturan, $warna);
    }
    ?>
</body>
</html>
