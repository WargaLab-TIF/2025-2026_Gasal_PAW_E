<?php

require_once 'function.php';

$nama = $telepon = $kelahiran = $email = $alamat = $kelamin = $NIK = $agama = $pendidikan = $gaji = $jabatan = '';
$error_nama = $error_telepon = $error_kelahiran = $error_email = $error_alamat = $error_kelamin = $error_NIK = $error_agama = $error_pendidikan = $error_gaji = $error_jabatan = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST ['nama']);
	$telepon = test_input($_POST ['telepon']);
	$email = test_input($_POST ['email']);
	$alamat = test_input($_POST ['alamat']);
	$kelamin = test_input($_POST ['kelamin'] ?? '');
	$kelahiran = test_input($_POST ['kelahiran']);
	$NIK = test_input($_POST ['NIK']);
	$agama = test_input($_POST ['agama']);
	$pendidikan = test_input($_POST ['pendidikan']);
	$gaji = test_input($_POST ['gaji']);
	$jabatan = test_input($_POST ['jabatan']);
	
	if (!wajib_isi($nama)) {
		$error_nama ="masukkan wajib di isi";
	}elseif (!alfabet($nama)) {
		$error_nama = "Masukkan wajib alfabet";
	}elseif (strlen($nama)  < 3 OR strlen($nama) > 20 ){
		$error_nama= "Masukkan minimal 3 karakter";
	}

	if (!wajib_isi($NIK)) {
		$error_NIK="masukkan wajib di isi";
	}elseif (!is_numerik($NIK)) {
		$error_NIK= "Masukkan wajib numerik";
	}elseif (strlen($NIK) !== 16) {
		$error_NIK= "Masukkan harus 16 karakter";
	}

	if (!wajib_isi($telepon)) {
		$error_telepon="masukkan wajib di isi";
	}elseif (!is_numerik($telepon)) {
		$error_telepon= "Masukkan wajib numerik";
	}elseif (strlen($telepon) < 8 OR strlen($telepon) > 15){
		$error_telepon= "Masukkan harus lebih dari 8 karakter";
	}

	if (!wajib_isi($kelahiran)) {
		$error_kelahiran="masukkan wajib di isi";
	}

	if (!wajib_isi($email)) {
		$error_email="masukkan wajib di isi";
	}elseif (!email($email)) {
		$error_email= "Masukkan format email";
	}

	if (!wajib_isi($alamat)) {
		$error_alamat="masukkan wajib di isi";
    }elseif (strlen($alamat) < 8 OR strlen($alamat) > 20){
		$error_telepon= "Masukkan harus lebih dari 8 karakter";
	}

	if (!wajib_isi($pendidikan)) {
	$error_pendidikan="masukkan wajib di isi";
	} 

	if (!wajib_isi($jabatan)) {
		$error_jabatan ="masukkan wajib di isi";
	}elseif (!alfabet($jabatan)) {
		$error_jabatan = "Masukkan wajib alfabet";
	}elseif (strlen($jabatan)  < 3 OR strlen($jabatan) > 20 ){
		$error_jabatan= "Masukkan minimal 3 karakter";
	}

	if (!wajib_isi($agama)) {
		$error_agama ="masukkan wajib di isi";
	}elseif (!alfabet($agama)) {
		$error_agama = "Masukkan wajib alfabet";
	}elseif (strlen($agama)  < 5 OR strlen($agama) > 17 ){
		$error_agama= "Masukkan minimal 5 karakter";
	}

	if (!wajib_isi($gaji)) {
		$error_gaji="masukkan wajib di isi";
	}

	if (!wajib_isi($kelamin)) {
		$error_kelamin="masukkan wajib di isi";
	}

	if (
    empty($error_nama) && 
    empty($error_telepon) && 
    empty($error_kelahiran) && 
    empty($error_email) && 
    empty($error_alamat) && 
    empty($error_agama) && 
    empty($error_kelamin) && 
    empty($error_NIK) && 
    empty($error_pendidikan)&&
    empty($error_gaji) &&
    empty($error_jabatan)
) {
    header("Location: success.html");
    exit;
}
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>form pegawai</title>
	<link rel="stylesheet" href="style.css?v=2">

</head>
<body>
	<form method="POST">
			<h3>Pendataan pegawai</h3> <br>

	<label>Nama: </label>
	<input type="text" name="nama" value="<?= $nama ?>">
	<div class="error"><?= $error_nama ?></div>

	<label>NIK: </label>
	<input type="text" name="NIK" value="<?= $NIK ?>">
	<div class="error"><?= $error_NIK ?></div>

	<label>Nomor Telepon:</label>
	<input type="text" name="telepon" value="<?= $telepon ?>">
	<div class="error"><?= $error_telepon ?></div>

	<label>Tanggal Lahir:</label>
	<input type="DATE" name="kelahiran" value="<?= $kelahiran ?>">
	<div class="error"><?= $error_kelahiran ?></div>

	<label>Email:</label>
	<input type="text" name="email" value="<?= $email ?>">
	<div class="error"><?= $error_email ?></div>

	<label for="pendidikan">Pendidikan:</label>
<select name="pendidikan" id="pendidikan">
    <option value="">Silahkan Pilih</option>
    <option value="sd"  <?= ($pendidikan == 'sd') ? 'selected' : '' ?>>SD / Sederajat</option>
    <option value="smp" <?= ($pendidikan == 'smp') ? 'selected' : '' ?>>SMP / Sederajat</option>
    <option value="sma" <?= ($pendidikan == 'sma') ? 'selected' : '' ?>>SMA / SMK / Sederajat</option>
    <option value="d1"  <?= ($pendidikan == 'd1') ? 'selected' : '' ?>>Diploma I (D1)</option>
    <option value="d2"  <?= ($pendidikan == 'd2') ? 'selected' : '' ?>>Diploma II (D2)</option>
    <option value="d3"  <?= ($pendidikan == 'd3') ? 'selected' : '' ?>>Diploma III (D3)</option>
    <option value="d4"  <?= ($pendidikan == 'd4') ? 'selected' : '' ?>>Diploma IV (D4)</option>
    <option value="s1"  <?= ($pendidikan == 's1') ? 'selected' : '' ?>>Sarjana (S1)</option>
    <option value="s2"  <?= ($pendidikan == 's2') ? 'selected' : '' ?>>Magister (S2)</option>
    <option value="s3"  <?= ($pendidikan == 's3') ? 'selected' : '' ?>>Doktor (S3)</option>
</select>
<div class="error"><?= $error_pendidikan ?></div>

<label>Jabatan:</label>
	<input type="text" name="jabatan" value="<?= $jabatan ?>">
	<div class="error"><?= $error_jabatan ?></div>


	<label for="gaji">Pendapatan:</label>
<select name="gaji" id="gaji">
    <option value="">Silahkan Pilih</option>
    <option value="g1"  <?= ($gaji == 'g1') ? 'selected' : '' ?>>5.000.000 - 6.000.000</option>
    <option value="g2" <?= ($gaji == 'g2') ? 'selected' : '' ?>>7.500.000 - 9.000.000</option>
    <option value="g3" <?= ($gaji == 'g3') ? 'selected' : '' ?>>10.000.000 - 15.000.000 </option>
    <option value="g4"  <?= ($gaji == 'g4') ? 'selected' : '' ?>>15.000.000 keatas</option>
</select>
<div class="error"><?= $error_gaji ?></div>

	<label>Alamat:</label>
	<input type="text" name="alamat" value="<?= $alamat ?>">
	<div class="error"><?= $error_alamat ?></div>

	<label>Agama:</label>
	<input type="text" name="agama" value="<?= $agama ?>">
	<div class="error"><?= $error_agama ?></div>

	<label>Jenis Kelamin:</label>
	<div class="jenis-kelamin">
    <input type="radio" id="perempuan" name="kelamin" value="perempuan" <?= ($kelamin == 'perempuan') ? 'checked' : '' ?>>
    <label for="perempuan">Perempuan</label>

    <input type="radio" id="lakiLaki" name="kelamin" value="laki-laki" <?= ($kelamin == 'laki-laki') ? 'checked' : '' ?>>
    <label for="lakiLaki">Laki-laki</label>
	</div>
	<div class="error"><?= $error_kelamin ?></div>


	<button type="submit">Kirim</button>
	</form>
</body>
</html>