<?php include 'Data.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TM1 - Tema Ganjil (240411100075)</title>
  <style>
    body {font-family: Arial, sans-serif; text-align: center; background: #f4f4f4;}
    h2 {margin-top: 20px;}
    table {margin: 20px auto; border-collapse: collapse;}
    th, td {border: 1px solid #999; padding: 5px 10px; text-align: center;}
    th {font-weight: bold; background: #ddd;}
    button {padding: 6px 10px; background: #2196f3; color: white; border: none; border-radius: 4px; cursor: pointer;}
    button:hover {background: #1976d2;}
    select, input[type=number] {padding: 4px;}
  </style>
</head>
<body>
  <h2>TM1 - Tema Ganjil (NIM: 240411100075)</h2>

  <form method="POST">
    <table>
      <tr>
        <th>Ukuran</th>
        <td><input type="number" name="ukuran" min="1" required></td>
      </tr>
      <tr>
        <th>Aturan</th>
        <td>
          <select name="aturan" required>
            <option value="">-- Pilih Aturan --</option>
            <option value="kuadrat">Bilangan Kuadrat</option>
            <option value="catur">Pola Papan Catur</option>
            <option value="komposit">Bilangan Komposit</option>
            <option value="diagonal">Arsiran Diagonal</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Warna</th>
        <td>
          <select name="warna" required>
            <option value="">-- Pilih Warna --</option>
            <option value="lightcoral">Merah Muda</option>
            <option value="lightgreen">Hijau Muda</option>
            <option value="lightblue">Biru Muda</option>
            <option value="khaki">Kuning</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit">Tampilkan</button></td>
      </tr>
    </table>
  </form>

  <?php
  if (isset($_POST['ukuran'])) {
    $ukuran = $_POST['ukuran'];
    $aturan = $_POST['aturan'];
    $warna  = $_POST['warna'];

    echo "<h3>Hasil Tabel Pangkat (Baris ^ Kolom)</h3>";
    echo "<table>";
    fungsi($ukuran, $aturan, $warna);
    echo "</table>";
  }
  ?>
</body>
</html>
