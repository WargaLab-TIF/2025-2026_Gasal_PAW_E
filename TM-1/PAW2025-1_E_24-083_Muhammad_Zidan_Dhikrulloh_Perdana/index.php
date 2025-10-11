<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TM1</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>

    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label>Ukuran Maksimal:</label>
                <input type="number" name="ukuran" required>
            </div>

            <div class="form-group">
                <label>Pilih Warna:</label>
                <select name="warna">
                    <option value="lightblue">Biru</option>
                    <option value="lightgreen">Hijau</option>
                    <option value="lightpink">Merah Muda</option>
                    <option value="lightyellow">Kuning</option>
                </select>
            </div>

            <div class="form-group">
                <label>Pilih Aturan:</label>
                <select name="aturan">
                    <option value="pertama">1. Bilangan Kuadrat</option>
                    <option value="kedua">2. Papan Catur</option>
                    <option value="ketiga">3. Bilangan Komposit</option>
                    <option value="keempat">4. Arsiran Diagonal</option>
                </select>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <div class="output">
        <?php 
            if (isset($_POST['submit'])) {
                
                $ukuran = $_POST["ukuran"];
                $warna  = $_POST["warna"];
                $aturan = $_POST["aturan"];
                require_once 'functions.php';
                buatTabel($ukuran, $aturan, $warna);
            }
        ?>
    </div>
    
</body>
</html>
