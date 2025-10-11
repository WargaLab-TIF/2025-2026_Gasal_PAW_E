<?php 
    require_once 'form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
      <div class="form-container">
        <h2>Membuat Table</h2>
        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="ukuran">Batas Ukuran</label>
            <input type="number" id="ukuran" name="ukuran" placeholder="Masukkan ukuran table" required>
          </div>
          <div class="form-group">
            <label for="aturan">Aturan filter</label>
            <select id="aturan" name="aturan" required>
              <option value="">-- Pilih --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
          <div class="form-group">
            <label for="warna">Warna filter</label>
            <select id="warna" name="warna" required>
              <option value="">-- Pilih --</option>
              <option value="Red">Red</option>
              <option value="Blue">Blue</option>
              <option value="Green">Green</option>
            </select>
          </div>
          <button type="submit">Kirim Data</button>
        </form>
      </div>
    </div>
    <hr>
    <div class="table-container">
        <?php 
          $ukuran = $_POST['ukuran'];
          $aturan = $_POST['aturan'];
          $warna = $_POST['warna'];

          echo Table($ukuran, $aturan, $warna);
        ?>
      </div>
</body>
</html>