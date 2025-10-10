
<?php

require_once 'function.php';

$nama = $telepon = $email = $alamat = $tanggal = $nik = $pendidikan = $gender = $jabatan = $gaji= '';

$error_nama = $error_telepon = $error_email = $error_alamat = $error_tanggal = $error_nik = $error_pendidikan = $error_gender = $error_jabatan = $error_gaji= '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST ['nama']?? '');
	$telepon = test_input($_POST ['telepon']?? '');
	$email = test_input($_POST ['email']?? '');
	$alamat = test_input($_POST ['alamat']?? '');
	$tanggal = test_input($_POST ['tanggal']?? '');
	$pendidikan = test_input($_POST['pendidikan'] ?? ''); 
	$nik = test_input($_POST ['nik']?? '');
	$gender = test_input($_POST ['gender'] ?? ''); 
	$jabatan = test_input($_POST ['jabatan']?? '');
	$gaji = test_input($_POST ['gaji']?? '');

	
	if (!wajib_isi($nama)) {
		$error_nama ="masukkan wajib di isi";
	}elseif (!alfabet($nama)) {
		$error_nama = "Masukkan wajib alfabet";
	}elseif (strlen($nama) < 3 || strlen($nama) > 50) { 
		$error_nama = "Nama harus 3 karakter sampai 50 karakter";
	}

	if (!wajib_isi($tanggal)) {
		$error_tanggal="masukkan wajib di isi";
	}

	if (!wajib_isi($nik)) {
		$error_nik="masukkan wajib di isi";
	}elseif (!nik($nik)) {
		$error_nik= "Masukkan wajib numerik";
	}elseif (strlen($nik) != 16) {
		$error_nik = "NIK harus 16 karakter";
	}

	if (!wajib_isi($gender)) {
		$error_gender="masukkan wajib di isi";
	}

	if (!wajib_isi($pendidikan)) {
		$error_pendidikan="masukkan wajib di isi";
	}

	if (!wajib_isi($jabatan)) {
		$error_jabatan="masukkan wajib di isi";
	}

	if (!wajib_isi($telepon)) {
		$error_telepon="masukkan wajib di isi";
	}elseif (!is_numerik($telepon)) {
		$error_telepon= "Masukkan wajib numerik";
	}elseif (strlen($telepon) < 8 OR strlen($telepon) > 15) { 
		$error_telepon = "Nomor harus 8 karakter sampai 15 karakter";
	}

	if (!wajib_isi($email)) {
		$error_email="masukkan wajib di isi";
	}elseif (!email($email)) {
		$error_email= "Masukkan format email";
	}

	if (!wajib_isi($alamat)) {
		$error_alamat="masukkan wajib di isi";
	}elseif (!alamat($alamat)) {
		$error_alamat = "Masukkan format alamat";
	} elseif (strlen($alamat) < 10 OR strlen($alamat) > 250) {
		$error_alamat = "Alamat harus antara 10 sampai 250 karakter" ;
	}

	if (!wajib_isi($gaji)) {
		$error_gaji="masukkan wajib di isi";
	}

	$form_valid = empty($error_nama) && 
				  empty($error_telepon) && 
				  empty($error_email) && 
				  empty($error_alamat) &&
				  empty($error_tanggal) &&
				  empty($error_nik) &&
				  empty($error_pendidikan) &&
                  empty($error_gender) &&
                  empty($error_jabatan);

	if ($form_valid) {
		header("Location: sukses.php");
        exit; 

		$nama = $telepon = $email = $alamat = $tanggal = $nik = $pendidikan = $gender = '';
	}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendataan Pegawai</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>

	<form method="POST">

	<h3>Pendataan Pegawai</h3>

	<label>Nama: </label>
	<input type="text" name="nama" value="<?=htmlspecialchars($nama)?>">
	<div class="error"><?= $error_nama ?></div>

	<label>Tanggal Lahir:</label>
	<input type="date" name="tanggal" value="<?=htmlspecialchars($tanggal)?>">
	<div class="error"><?= $error_tanggal ?></div>

	<label>Nomor Induk Kependudukan (NIK) :</label>
	<input type="text" name="nik" value="<?=htmlspecialchars($nik)?>">
	<div class="error"><?= $error_nik ?></div>

	<label>Jenis Kelamin:</label>
	<input type="radio" name="gender" value="perempuan" <?= ($gender == 'perempuan') ? 'checked' : '' ?>> <label>Perempuan</label>
	<input type="radio" name="gender" value="lakilaki" <?= ($gender == 'lakilaki') ? 'checked' : '' ?>><label>Laki-Laki</label>
	<div class="error"><?= $error_gender ?></div>

	<label>Riwayat Pendidikan:</label>
	<select name="pendidikan">
	    <option value="" disabled <?= (empty($pendidikan)) ? 'selected' : '' ?>>-- Pilih Pendidikan --</option> 
	    <option value="SD" <?= ($pendidikan == 'SD') ? 'selected' : '' ?>>Sederajat (SD)</option>
	    <option value="SMP" <?= ($pendidikan == 'SMP') ? 'selected' : '' ?>>Sekolah Menengah Pertama (SMP)</option>
	    <option value="SMA" <?= ($pendidikan == 'SMA') ? 'selected' : '' ?>>Sekolah Menengah Keatas (SMA)</option>
	    <option value="D1" <?= ($pendidikan == 'D1') ? 'selected' : '' ?>>D1</option>
	    <option value="D2" <?= ($pendidikan == 'D2') ? 'selected' : '' ?>>D2</option>
	    <option value="D3" <?= ($pendidikan == 'D3') ? 'selected' : '' ?>>D3</option>
	    <option value="D4" <?= ($pendidikan == 'D4') ? 'selected' : '' ?>>D4</option>
	    <option value="S1" <?= ($pendidikan == 'S1') ? 'selected' : '' ?>>S1</option>
	    <option value="S2" <?= ($pendidikan == 'S2') ? 'selected' : '' ?>>S2</option>
	    <option value="S3" <?= ($pendidikan == 'S3') ? 'selected' : '' ?>>S3</option>
	</select>
	<div class="error"><?= $error_pendidikan ?></div>

	<label>Nomor telepon:</label>
	<input type="text" name="telepon"  value="<?=htmlspecialchars($telepon)?>">
	<div class="error"><?= $error_telepon ?></div>

	<label>Email:</label>
	<input type="text" name="email" value="<?=htmlspecialchars($email)?>">
	<div class="error"><?= $error_email?></div>

	<label>Alamat Lengkap:</label>
	<input type="text" name="alamat" value="<?=htmlspecialchars($alamat)?>">
	<div class="error"><?= $error_alamat ?></div>

	<label>Jabatan:</label>
	<input type="text" name="jabatan" value="<?=htmlspecialchars($jabatan)?>">
	<div class="error"><?= $error_jabatan?></div>

	<label>Gaji Pokok:</label>
	<select name="gaji">
	    <option value="" disabled <?= (empty($gaji)) ? 'selected' : '' ?>>-- Pilih Gaji Pokok --</option> 
	    <option value="0-1.000.000" <?= ($gaji == '0-1.000.000') ? 'selected' : '' ?>>0-1.000.000</option>
	    <option value="1.000.000 - 2.500.000" <?= ($gaji == '1.000.000 - 2.500.000') ? 'selected' : '' ?>>1.000.000 - 2.500.000</option>
	    <option value="2.500.000 - 4.000.000" <?= ($gaji == '2.500.000 - 4.000.000') ? 'selected' : '' ?>>2.500.000 - 4.000.000</option>
	    <option value="4.000.000 - 5.500.000" <?= ($gaji == '4.000.000 - 5.500.000') ? 'selected' : '' ?>>4.000.000 - 5.500.000</option>
	    <option value="5.500.000 - 6.000.000" <?= ($gaji == '5.500.000 - 6.000.000') ? 'selected' : '' ?>>5.500.000 - 6.000.000</option>
	    <option value="6.000.000 - 8.500.000" <?= ($gaji == '6.000.000 - 8.500.000') ? 'selected' : '' ?>>6.000.000 - 8.500.000</option>
	    <option value="8.500.000 - 10.000.000" <?= ($gaji == '8.500.000 - 10.000.000') ? 'selected' : '' ?>>8.500.000 - 10.000.000</option>
	</select>
	<div class="error"><?= $error_gaji?></div>



	<button type="submit">Kirim</button>
	</form>
</body>
</html>