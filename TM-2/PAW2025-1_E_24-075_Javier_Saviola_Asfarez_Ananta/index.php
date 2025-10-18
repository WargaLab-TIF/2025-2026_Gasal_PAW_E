<?php
// TM2 - Tema C (Real Estate) - Kelas E
// NIM: 240411100075

$nim = "240411100075";
$pemilik = $alamat = $id = $luas = $harga = "";
$error = [];
$sukses = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pemilik = htmlspecialchars($_POST["pemilik"] ?? "");
    $alamat = htmlspecialchars($_POST["alamat"] ?? "");
    $id = htmlspecialchars($_POST["id"] ?? "");
    $luas = htmlspecialchars($_POST["luas"] ?? "");
    $harga = htmlspecialchars($_POST["harga"] ?? "");

    // Validasi wajib isi
    if (empty($pemilik)) $error["pemilik"] = "Nama pemilik wajib diisi.";
    if (empty($alamat)) $error["alamat"] = "Alamat wajib diisi.";
    if (empty($id)) $error["id"] = "ID properti wajib diisi.";
    if (empty($luas)) $error["luas"] = "Luas wajib diisi.";
    if (empty($harga)) $error["harga"] = "Harga wajib diisi.";

    // Validasi format
    if (!empty($pemilik) && !preg_match("/^[a-zA-Z ]+$/", $pemilik)) {
        $error["pemilik"] = "Nama hanya boleh huruf dan spasi.";
    }
    if (!empty($id) && (!preg_match("/^[A-Za-z0-9]+$/", $id) || strlen($id) != 6)) {
        $error["id"] = "ID harus 6 karakter dan hanya huruf/angka.";
    }
    if (!empty($luas) && !preg_match("/^[0-9]+$/", $luas)) {
        $error["luas"] = "Luas harus berupa angka.";
    }
    if (!empty($harga) && (!preg_match("/^[0-9]+$/", $harga) || strlen($harga) < 6)) {
        $error["harga"] = "Harga harus angka minimal 6 digit.";
    }

    if (empty($error)) {
        $sukses = "✅ Data berhasil disimpan untuk pemilik: <b>$pemilik</b>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>TM2 - Tema C (Real Estate) - 240411100075</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Form Pendataan Properti</h2>
  <p><b>NIM:</b> <?= $nim ?></p>

  <?php if (!empty($sukses)): ?>
      <div class="sukses"><?= $sukses ?></div>
  <?php endif; ?>

  <form method="post" action="">
    <!-- Tambah input tersembunyi agar NIM tidak error -->
    <input type="hidden" name="nim" value="<?= $nim ?>">

    <label>Nama Pemilik</label>
    <input type="text" name="pemilik" value="<?= $pemilik ?>">
    <small class="error"><?= $error["pemilik"] ?? "" ?></small>

    <label>Alamat Properti</label>
    <input type="text" name="alamat" value="<?= $alamat ?>">
    <small class="error"><?= $error["alamat"] ?? "" ?></small>

    <label>ID Properti (6 karakter)</label>
    <input type="text" name="id" value="<?= $id ?>">
    <small class="error"><?= $error["id"] ?? "" ?></small>

    <label>Luas (m²)</label>
    <input type="text" name="luas" value="<?= $luas ?>">
    <small class="error"><?= $error["luas"] ?? "" ?></small>

    <label>Harga (Rp)</label>
    <input type="text" name="harga" value="<?= $harga ?>">
    <small class="error"><?= $error["harga"] ?? "" ?></small>

    <button type="submit">Kirim</button>
    <button type="reset">Reset</button>
  </form>
</div>
</body>
</html>
