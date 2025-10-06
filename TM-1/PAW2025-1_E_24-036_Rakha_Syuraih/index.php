
<?php
include "functions.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Modulus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Tabel Modulus</h2>

        <form method="post">
            <label for="batas">Batas ukuran: </label>
            <input type="number" id="batas" name="batas" min="2"
                value="<?php if(isset($_POST['batas'])) echo htmlspecialchars($_POST['batas']); ?>" required><br><br>

            <label for="aturan">Aturan filter: </label>
            <select id="aturan" name="aturan">
                <option value="kubik" <?php if(isset($_POST['aturan']) && $_POST['aturan']=="kubik") echo "selected"; ?>>Bilangan Kubik</option>
                <option value="border" <?php if(isset($_POST['aturan']) && $_POST['aturan']=="border") echo "selected"; ?>>Pola Perbatasan</option>
                <option value="prima" <?php if(isset($_POST['aturan']) && $_POST['aturan']=="prima") echo "selected"; ?>>Bilangan Prima</option>
                <option value="diagonal" <?php if(isset($_POST['aturan']) && $_POST['aturan']=="diagonal") echo "selected"; ?>>Arsiran Diagonal</option>
            </select><br><br>

            <label for="warna">Pilih Warna: </label>
            <select id="warna" name="warna">
                <option value="red" <?php if(isset($_POST['warna']) && $_POST['warna']=="red") echo "selected"; ?>>Merah</option>
                <option value="blue" <?php if(isset($_POST['warna']) && $_POST['warna']=="blue") echo "selected"; ?>>Biru</option>
                <option value="yellow" <?php if(isset($_POST['warna']) && $_POST['warna']=="yellow") echo "selected"; ?>>Kuning</option>
            </select><br><br>

            <button type="submit">Tampilkan</button>
        </form>

        <?php
        if (!empty($_POST["batas"]) && !empty($_POST["aturan"]) && !empty($_POST["warna"])) {
            $batas  = (int)$_POST["batas"];
            $aturan = $_POST["aturan"];
            $warna  = $_POST["warna"];
            buatTabelModulus($batas, $aturan, $warna);
        }
        ?>
    </main>
</body>
</html>


