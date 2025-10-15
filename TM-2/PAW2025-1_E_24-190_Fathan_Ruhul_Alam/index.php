<?php 

require_once "function.php";

$opsi_departemen = ["Keuangan", "IT", "Marketing", "Operasional"];
$nip = $kp = $nama = $jabatan = $telepon = $alamat = $departemen = '';
$error_nip = $error_kp = $error_nama = $error_jabatan = $error_telepon = $error_alamat = $error_departemen = '';
$pesan_sukses = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nip = test_input($_POST['nip']);
	$kp = test_input($_POST['kp']);
	$nama = test_input($_POST['nama']);
	$jabatan = test_input($_POST['jabatan']);
	$telepon = test_input($_POST['telepon']);
	$alamat = test_input($_POST['alamat']);
	$departemen = test_input($_POST['departemen']);

	if (!wajib_isi($nip)) {
		$error_nip = "Masukkan wajib di isi";
	} elseif (!nip($nip)) {
		$error_nip = "Masukkan wajib angka dan 10 digit";
	}

	if (!wajib_isi($kp)) {
		$error_kp = "Masukkan wajib di isi";
	} elseif (!kp($kp)) {
		$error_kp = "Masukkan wajib sesuai format (Contoh: AA-12345)";
	}

	if (!wajib_isi($nama)) {
		$error_nama = "Masukkan wajib di isi";
	} elseif (!alfabet($nama)) {
		$error_nama = "Masukkan wajib alfabet";
	}

	if (!wajib_isi($jabatan)) {
		$error_jabatan = "Masukkan wajib di isi";
	} elseif (!alfabet($jabatan)) {
		$error_jabatan = "Masukkan wajib alfabet";
	}

	if (!wajib_isi($telepon)) {
		$error_telepon = "Masukkan wajib di isi";
	} elseif (!numerik($telepon)) {
		$error_telepon = "Masukkan wajib angka";
	}

	if (!wajib_isi($alamat)) {
		$error_alamat = "Masukkan wajib di isi";
	} elseif (!alamat($alamat)) {
		$error_alamat = "Masukkan alpanumeric";
	}

	if (!wajib_isi($departemen)) {
		$error_departemen = "Masukkan wajib di isi";
	}

	if (empty($error_nip) && empty($error_kp) && empty($error_nama) && empty($error_jabatan) && empty($error_telepon) && empty($error_alamat) && empty($error_departemen)) {
		$pesan_sukses = "Berhasil Memasukkan Data!";

        $nip = $kp = $nama = $jabatan = $telepon = $alamat = $departemen = '';
	}
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Data Pegawai</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="index.php" method="POST">
        <h2>Formulir Data Pegawai</h2>

        <?php if ($pesan_sukses): ?>
            <div class="sukses"><?= $pesan_sukses; ?></div>
        <?php endif; ?>

        <label>Nomor Induk Pegawai :</label>
		<input type="text" name="nip" value="<?= $nip; ?>" placeholder="Masukkan NIP Anda (10 Digit)">
		<div class="error"><?= $error_nip; ?></div>

		<label>Kode Pegawai :</label>
		<input type="text" name="kp" value="<?= $kp; ?>" placeholder="Masukkan Kode Pegawai Sesuai Format(AA-12345)">
		<div class="error"><?= $error_kp; ?></div>
		
        <label>Nama Lengkap :</label>
		<input type="text" name="nama" value="<?= $nama; ?>" placeholder="Masukkan Nama Lengkap Anda">
		<div class="error"><?= $error_nama; ?></div>

		<label>Jabatan :</label>
		<input type="text" name="jabatan" value="<?= $jabatan; ?>" placeholder="Masukkan Jabatan Anda">
		<div class="error"><?= $error_jabatan; ?></div>

		<label>Nomor Telepon : </label>
		<input type="text" name="telepon" value="<?= $telepon  ?>" placeholder="Masukkan Nomor Telepon Anda Sesuai Format (0812345678)">
		<div class="error"><?=$error_telepon ?></div>

		<label>Alamat :</label>
		<input type="text" name="alamat" value="<?= $alamat; ?>" placeholder="Masukkan Alamat Anda">
		<div class="error"><?= $error_alamat; ?></div>
        
        <label>Departemen :</label>
		<select name="departemen">
            <option value="">-- Pilih Departemen --</option>
            <?php foreach ($opsi_departemen as $opsi) : ?>
                <option value="<?= $opsi; ?>" <?= ($departemen == $opsi) ? 'selected' : ''; ?>>
                    <?= $opsi; ?>
                </option>
            <?php endforeach; ?>
        </select>
		<div class="error"><?= $error_departemen; ?></div>
        <button type="submit" name="submit">Submit</button>
            
	</form>
</body>
</html>