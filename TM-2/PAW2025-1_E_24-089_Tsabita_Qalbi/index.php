<?php
include "functions.php";

$nama = "";
$alamat = "";
$idProperti = "";
$harga = "";
$luas = "";
$telepon = "";
$catatan = "";

$pesanError = [];
$pesanSukses = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ambil data
    $nama = $_POST['nama'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $idProperti = $_POST['idProperti'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $luas = $_POST['luas'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $catatan = $_POST['catatan'] ?? '';

    // validasi 1: semua wajib diisi
    foreach ([
        'Nama Properti' => $nama,
        'Alamat' => $alamat,
        'ID Properti' => $idProperti,
        'Harga' => $harga,
        'Luas' => $luas,
        'Telepon' => $telepon,
        'Catatan' => $catatan
    ] as $namaField => $isi) {
        $err = cekKosong($isi, $namaField);
        if ($err != "") $pesanError[] = $err;
    }

    // lanjut validasi detail jika tidak kosong
    if (empty($pesanError)) {
        // nama: alfabet + panjang 3–50
        if ($x = cekAlfabet($nama, "Nama Properti")) $pesanError[] = $x;
        if ($x = cekPanjang($nama, "Nama Properti", 3, 50)) $pesanError[] = $x;

        // idProperti: alfanumerik + panjang 6–10
        if ($x = cekAlfanumerik($idProperti, "ID Properti")) $pesanError[] = $x;
        if ($x = cekPanjang($idProperti, "ID Properti", 6, 10)) $pesanError[] = $x;

        // alamat: alfanumerik + panjang 10–100
        if ($x = cekAlfanumerik($alamat, "Alamat")) $pesanError[] = $x;
        if ($x = cekPanjang($alamat, "Alamat", 10, 100)) $pesanError[] = $x;

        // harga: angka + panjang 5–12
        if ($x = cekAngka($harga, "Harga")) $pesanError[] = $x;
        if ($x = cekPanjang($harga, "Harga", 5, 12)) $pesanError[] = $x;

        // luas: angka + panjang 1–6
        if ($x = cekAngka($luas, "Luas")) $pesanError[] = $x;
        if ($x = cekPanjang($luas, "Luas", 1, 6)) $pesanError[] = $x;

        // telepon: angka + panjang 10–13
        if ($x = cekAngka($telepon, "Telepon")) $pesanError[] = $x;
        if ($x = cekPanjang($telepon, "Telepon", 10, 13)) $pesanError[] = $x;

        // catatan: alfanumerik + panjang 5–200
        if ($x = cekAlfanumerik($catatan, "Catatan")) $pesanError[] = $x;
        if ($x = cekPanjang($catatan, "Catatan", 5, 200)) $pesanError[] = $x;
    }

    // jika tidak ada error
    if (empty($pesanError)) {
        $pesanSukses = "✅ Data berhasil dikirim! Semua isian valid.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Real Estate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Pendataan Properti / Aset</h1>

    <?php if (!empty($pesanError)): ?>
        <div class="error-box">
            <b>Terjadi kesalahan:</b>
            <ul>
                <?php foreach ($pesanError as $e): ?>
                    <li><?= esc($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($pesanSukses != ""): ?>
        <div class="success-box"><?= esc($pesanSukses) ?></div>
    <?php endif; ?>

    <form method="post" action="index.php" novalidate>
        <label>Nama Properti:</label>
        <input type="text" name="nama" value="<?= esc($nama) ?>"><br>

        <label>ID Properti:</label>
        <input type="text" name="idProperti" value="<?= esc($idProperti) ?>"><br>

        <label>Alamat:</label>
        <textarea name="alamat"><?= esc($alamat) ?></textarea><br>

        <label>Harga (Rp):</label>
        <input type="text" name="harga" value="<?= esc($harga) ?>"><br>

        <label>Luas (m²):</label>
        <input type="text" name="luas" value="<?= esc($luas) ?>"><br>

        <label>Telepon Pemilik:</label>
        <input type="text" name="telepon" value="<?= esc($telepon) ?>"><br>

        <label>Catatan:</label>
        <textarea name="catatan"><?= esc($catatan) ?></textarea><br>

        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
    </form>
</div>
</body>
</html>