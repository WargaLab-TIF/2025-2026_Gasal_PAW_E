<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Modulus Dinamis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tabel Modulus Berdasarkan Batas Ukuran</h2>
    <form method="POST" action="index.php">
        <label for="batas">Masukkan batas ukuran:</label>
        <input type="number" name="batas" id="batas" >

        <label for="aturan">Pilih aturan filter:</label>
        <select name="aturan" id="aturan">
            <option value="kubik">Bilangan Kubik</option>
            <option value="perbatasan">Pola Perbatasan</option>
            <option value="prima">Bilangan Prima</option>
            <option value="diagonal">Pola Diagonal Kiri-Atas ke Kanan-Bawah</option>
        </select>

        <label for="warna">Pilih warna filter:</label>
        <select name="warna" id="warna">
            <option value="kuning">Kuning</option>
            <option value="merah">Merah</option>
            <option value="biru">Biru</option>
        </select>

        <button type="submit">Tampilkan Tabel</button>
    </form>

    <div class="output">
        <?php
            include 'function.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $batas = $_POST['batas'];
                $aturan = $_POST['aturan'];
                $warna = $_POST['warna'];

                // Panggil fungsi dari file function.php
                tampilkanTabelModulus($batas, $aturan, $warna);
            }
        ?>
    </div>
</body>
</html>
