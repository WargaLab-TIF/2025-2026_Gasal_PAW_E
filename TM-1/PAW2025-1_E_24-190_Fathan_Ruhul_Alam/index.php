<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Mingguan 1 - PAW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    require_once 'fungsi.php';

    $ukuran = 10;
    $aturan = 'kubik';
    $warna = 'pink';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ukuran = isset($_POST['ukuran']) ? intval($_POST['ukuran']) : 10;
        $aturan = isset($_POST['aturan']) ? $_POST['aturan'] : 'kubik';
        $warna = isset($_POST['warna']) ? $_POST['warna'] : 'pink';
    }
    ?>

    <h1>TM1 - Tabel Modulus</h1>

    <form action="index.php" method="POST">
        <div>
            <label for="ukuran">Batas Ukuran Tabel:</label>
            <input type="number" id="ukuran" name="ukuran" value="<?php echo $ukuran; ?>" min="1">
        </div>
        <br>
        <div>
            <label for="aturan">Aturan Filter Tampilan:</label>
            <select id="aturan" name="aturan">
                <option value="kubik" <?php if ($aturan == 'kubik') echo 'selected'; ?>>Bilangan Kubik</option>
                <option value="perbatasan" <?php if ($aturan == 'perbatasan') echo 'selected'; ?>>Pola Perbatasan</option>
                <option value="prima" <?php if ($aturan == 'prima') echo 'selected'; ?>>Bilangan Prima</option>
                <option value="diagonal_kiri_atas" <?php if ($aturan == 'diagonal_kiri_atas') echo 'selected'; ?>>Diagonal Tengah (Kiri Atas)</option>
            </select>
        </div>
        <br>
        <div>
            <label for="warna">Warna Filter Tampilan:</label>
            <select id="warna" name="warna">
                <option value="pink" <?php if ($warna == 'pink') echo 'selected'; ?>>Pink</option>
                <option value="grey" <?php if ($warna == 'grey') echo 'selected'; ?>>Abu</option>
                <option value="biru" <?php if ($warna == 'biru') echo 'selected'; ?>>Biru</option>
            </select>
        </div>
        <br>
        <button type="submit">Buat Tabel</button>
    </form>

    <?php
    buatTabelModulus($ukuran, $aturan, $warna);
    ?>

</body>
</html>