<?php
require_once 'function.php';

$nip = $nama = $nomor = $email = $alamat = '';
$error_nip = $error_nama = $error_nomor = $error_email = $error_alamat = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nip = test_input($_POST['nip']);
    $nama = test_input($_POST['nama']);
    $nomor = test_input($_POST['nomor']);
    $email = test_input($_POST['email']);
    $alamat = test_input($_POST['alamat']);

    // VALIDASI NIP
    if (!tidak_boleh_kosong($nip)) {
        $error_nip = "Masukkan tidak boleh kosong";
    } elseif (!numerikBatas($nip)) {
        $error_nip = "Masukkan harus NUMERIK";
    }

    // VALIDASI NAMA PEGAWAI
    if (!tidak_boleh_kosong($nama)) {
        $error_nama = "Masukkan tidak boleh kosong";
    } elseif (!alfabet($nama)) {
        $error_nama = "Masukkan wajib ALFABET";
    }

    // VALIDASI NOMOR TELEPON
    if (!tidak_boleh_kosong($nomor)) {
        $error_nomor = "Masukkan tidak boleh kosong";
    } elseif (!numerikBatas($nomor)) {
        $error_nomor = "Masukkan harus NUMERIK dan minimal 10 digit";
    } 

     // VALIDASI EMAIL
    if (!tidak_boleh_kosong($email)) {
		$error_email = "Masukkan tidak boleh kosong";
	}elseif (!email($email)) {
		$error_email = "Masukan wajib format email";
	}

    // VALIDASI ALAMAT (alfanumerik batas panjang)
    if (!tidak_boleh_kosong($alamat)) {
        $error_alamat = "Masukkan tidak boleh kosong";
    } elseif (!alfanumerikBatas($alamat)) {
        $error_alamat = "Masukkan alamat minimal 15 karakter.";
    }

    if (empty($error_nip) && empty($error_nama) && empty($error_nomor) && empty($error_email) && empty($error_alamat)) {
        echo "Berhasil Memasukkan Data";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM DATA KEPEGAWAIAN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="POST">
        <label>NIP Pegawai :</label>
        <input type="text" name="nip" value="<?= $nip ?>">
        <div class="error"><?= $error_nip ?></div>

        <label>Nama Pegawai :</label>
        <input type="text" name="nama" value="<?= $nama ?>">
        <div class="error"><?= $error_nama ?></div>

        <label>Nomor Telepon :</label>
        <input type="text" name="nomor" value="<?= $nomor ?>">
        <div class="error"><?= $error_nomor ?></div>

        <label>Email:</label>
        <input type="text" name="email" value="<?= $email ?>">
        <div class="error"><?= $error_email ?></div>

        <label>Alamat Lengkap :</label>
        <input type="text" name="alamat" value="<?= $alamat ?>">
        <div class="error"><?= $error_alamat ?></div>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
