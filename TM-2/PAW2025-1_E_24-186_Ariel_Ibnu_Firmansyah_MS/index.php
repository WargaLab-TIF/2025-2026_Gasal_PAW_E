<?php 

require_once 'function.php';

$nama = '';
$nip = '';
$jabatan = '';
$email = '';
$alamat = '';
$tempat_tanggal_lahir = '';
$jenis_kelamin = '';



$error_nama = '';
$error_nip = '';
$error_jabatan = '';
$error_email = '';
$error_alamat = '';
$error_tempat_tanggal_lahir = '';
$error_jenis_kelamin = '';

$sukses ='';

if (isset($_POST['submit'])) {
    $nama = input($_POST['nama'] ?? '');
    $nip = input($_POST['nip'] ?? '');
    $jabatan =input($_POST['jabatan'] ?? '');
    $email = input($_POST['email'] ?? '');
    $alamat = input($_POST['alamat'] ?? '');
    $tempat_tanggal_lahir =input($_POST['tempat_tanggal_lahir'] ?? '');
    $jenis_kelamin = input($_POST['jenis_kelamin'] ?? '');
    


    if (!wajib_isi($nama)) {
        $error_nama = "Nama wajib diisi.";
    } elseif (!alfabet($nama)) {
        $error_nama = "Nama hanya boleh huruf.";
    } elseif (strlen($nama) < 3) {
        $error_nama = "Nama minimal 3 huruf.";
    }


    if (!wajib_isi($nip)) {
        $error_nip = "NIP wajib diisi.";
    } elseif (!numerik($nip)) {
        $error_nip = "NIP hanya boleh angka.";
    } elseif (strlen($nip) != 8) {
        $error_nip = "NIP harus terdiri dari 8 digit.";
    }


    if (!wajib_isi($jabatan)) {
        $error_jabatan = "Jabatan wajib diisi.";
    } elseif (!alfabet($jabatan)) {
        $error_jabatan = "Jabatan hanya boleh huruf.";
    } elseif (strlen($jabatan) < 3) {
        $error_jabatan = "Jabatan minimal 3 huruf.";
    }


    if (!wajib_isi($email)) {
        $error_email = "Email wajib diisi.";
    } elseif (!email($email)) {
        $error_email = "Format email tidak valid.";
    }


    if (!wajib_isi($alamat)) {
        $error_alamat = "Alamat wajib diisi.";
    } elseif (!alfanumerik($alamat)) {
        $error_alamat = "Alamat hanya boleh huruf, angka, koma, titik, atau strip.";
    } elseif (strlen($alamat) < 5) {
        $error_alamat = "Alamat minimal 5 karakter.";
    }


    if (!wajib_isi($tempat_tanggal_lahir)) {
        $error_tempat_tanggal_lahir = "Tanggal lahir wajib diisi.";
    } elseif (!alfanumerik($tempat_tanggal_lahir)) {
        $error_tempat_tanggal_lahir = "Hanya boleh huruf, angka, koma, titik, atau strip.";
    } elseif(strlen($tempat_tanggal_lahir) < 5) {
        $error_tempat_tanggal_lahir = "minimal 5 karakter.";
    }


    if (!wajib_isi($jenis_kelamin)) {
        $error_jenis_kelamin = "Jenis kelamin wajib dipilih.";
    }



    if (
        empty($error_nama) && empty($error_nip) &&
        empty($error_jabatan) && empty($error_email) &&
        empty($error_alamat) && empty($error_tempat_tanggal_lahir) &&
        empty($error_jenis_kelamin)
    ) {
        $sukses = "✅ Berhasil Memasukkan Data";
    }
        

}
?>



<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendataan Pegawai</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST">

		<h2>FORM PENDATAAN PEGAWAI ARTERI DIGITAL</h2>

		<label>Nama Pegawai:</label>
		<input type="text" name="nama" value="<?= $nama ?>">
		<div class="error"><?=$error_nama ?> </div>

		<label>NIP :</label>
		<input type="text" name="nip" value="<?= $nip ?>">
		<div class="error"><?=$error_nip ?> </div>

		<label>Jabatan:</label>
	    <input type="text" name="jabatan" value="<?= $jabatan ?>">
	    <div class="error"><?= $error_jabatan ?></div>

	    <label>Email :</label>
		<input type="text" name="email" value="<?= $email ?>">
		<div class="error"><?=$error_email ?> </div>

		<label>Alamat :</label>
		<input type="text" name="alamat" value="<?= $alamat ?>">
		<div class="error"><?=$error_alamat ?></div>

        <label>Tempat Tanggal Lahir:</label>
        <input type="text" name="tempat_tanggal_lahir" value="<?= $tempat_tanggal_lahir ?>">
        <div class="error"><?= $error_tempat_tanggal_lahir ?></div>

	    <label>Jenis Kelamin :</label>
		<input type="radio" name="jenis_kelamin" value="Laki-Laki" <?= ($jenis_kelamin == "Laki-Laki") ? 'checked' : ''?>> Laki-Laki
		<input type="radio" name="jenis_kelamin" value="Perempuan" <?= ($jenis_kelamin == "Perempuan") ? 'checked' : ''?>> Perempuan
		<div class="error"><?=$error_jenis_kelamin ?></div>


		<button type="submit" name="submit">kirim</button>
        <?php if (!empty($sukses)): ?>
            <div class="sukses">
                <?= $sukses ?>
            </div>
        <?php endif; ?>
	</form>
</body>
</html>