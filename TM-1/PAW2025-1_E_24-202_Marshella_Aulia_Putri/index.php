<?php
include "function.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Modulus Dinamis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Generate Tabel Modulus</h1>

<form method="POST" class="form-container">
    <label for="ukuran">Ukuran Tabel:</label>
    <input type="number" id="ukuran" name="ukuran" min="1" required>

    <label for="aturan" >Pilih Aturan:</label>
    <select name="aturan" id="aturan">
        <option value="1">Kubik</option>
        <option value="2">Perbatasan</option>
        <option value="3">Prima</option>
        <option value="4">Diagonal</option>
    </select>

    <label for="warna">Pilih Warna:</label>
    <select name="warna" id="warna">
        <option value="grey">Grey</option>
        <option value="pink">Pink</option>
        <option value="lightblue">Light Blue</option>
        <option value="lightgreen">Light Green</option>
    </select>

    <button type="submit" class="generate-button">Buat Tabel</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ukuran = $_POST["ukuran"];
    $aturan = $_POST["aturan"];
    $warna  = $_POST["warna"];

    echo "<h2>Hasil Tabel Modulus</h2>";

    if ($ukuran > 0) {
        buatTabelModulus($ukuran, $aturan, $warna);
    } else {
        echo "<p class='error'>Ukuran harus bilangan asli!</p>";
    }
}
?>

</body>
</html>
