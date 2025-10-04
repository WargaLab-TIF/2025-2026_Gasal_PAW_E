<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabel Modulus</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h3>Form Tabel</h3>
    <form method="POST" action="#">
      <label for="ukuran">Masukkan nilai batas ukuran: </label>
      <input type="number" name="ukuran" id="ukuran" min="1" required>

      <label for="warna">Pilih Warna:</label>
      <select id="warna" name="warna" required>
        <option value="" disabled selected hidden>-- Pilih warna --</option>
        <option value="red">Merah</option>
        <option value="yellow">Kuning</option>
        <option value="green">Hijau</option>
        <option value="blue">Biru</option>
        <option value="pink">Pink</option>
      </select>

      <label for="aturan">Pilih Aturan:</label>
      <select id="aturan" name="aturan" required>
        <option value="" disabled selected hidden>-- Pilih aturan --</option>
        <option value="kubik">Bilangan Kubik</option>
        <option value="perbatasan">Pola Perbatasan</option>
        <option value="prima">Bilangan Prima</option>
        <option value="diagonal">Arsiran Diagonal</option>
      </select>

      <input type="submit" name="submit" value="Tampilkan">
    </form>

    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          require_once __DIR__ . '/fungsi.php';
          $ukuran = (int) ($_POST['ukuran']);
          $aturan = (string) ($_POST['aturan']);
          $warna  = (string) ($_POST['warna']);

          if ($ukuran >= 1) {
              echo "<h3>Hasil Tabel Modulus</h3>";
              echo "<p>Nilai batas: $ukuran — warna: $warna — aturan: $aturan</p>";
              echo TampilanTabelModulus($ukuran, $aturan, $warna);
          } else {
              echo "<p>Masukkan nilai ukuran yang valid.</p>";
          }
      }
    ?>
  </div>
</body>
</html>
