<?php 
	require_once 'function.php';

	$nama = $nik = $jenis = $alamat = $merk = $rangka = $tahun = $success = $kodejenis = '';
	$error_nama = $error_nik = $error_jenis = $error_alamat = $error_merk = $error_rangka = $error_tahun = $error_kodejenis = '';

	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$alamat = $_POST['alamat'];
		$jenis = $_POST['jenis'];
		$merk = $_POST['merk'];
		$rangka = $_POST['rangka'];
		$tahun = $_POST['tahun'];
		$kodejenis = $_POST['kodejenis'];

		if (kosong($nama)) {
			$error_nama = "masukkan wajib diisi";
		} elseif (!alfabet($nama)) {
			$error_nama = "masukkan wajib alfabet";
		} else {
			$error_nama = "";
		}


		if (kosong($nik)) {
			$error_nik = "masukkan wajib diisi";
		} elseif(!numeric($nik)){
			$error_nik = "masukkan harus berbentuk numeric";
		} elseif(!panjang($nik,16)){
			$error_nik = "masukkan harus 16 digit";
		} else {
			$error_nik = "";
		}


		if (kosong($alamat)) {
			$error_alamat = "masukkan wajib diisi";
		} else {
			$error_alamat = "";
		}


		if (kosong($jenis)) {
			$error_jenis = "masukkan wajib dipilih";
		} else {
			$error_jenis = "";
		}


		if (kosong($merk)) {
			$error_merk = "masukkan wajib diisi";
		} elseif (!alfabet($merk)) {
			$error_merk = "masukkan wajib alfabet";
		} else {
			$error_merk = "";
		}


		if (kosong($tahun)) {
			$error_tahun = "masukkan wajib diisi";
		} elseif(!numeric($tahun)){
			$error_tahun = "masukkan harus berbentuk numeric";
		} else {
			$error_tahun = "";
		}

		if (kosong($kodejenis)) {
			$error_kodejenis = "masukkan wajib diisi";
		} elseif(!alfanumeric($kodejenis)){
			$error_kodejenis = "masukkan harus berbentuk alfanumeric";
		} else {
			$error_kodejenis = "";
		}


		if (kosong($rangka)) {
			$error_rangka = "masukkan wajib diisi";
		} elseif(!alfanumeric($rangka)){
			$error_rangka = "masukkan harus berbentuk alfanumeric";
		} elseif(!panjang($rangka,17)){
			$error_rangka = "masukkan harus 17 karakter";
		} else {
			$error_rangka = "";
		}

	if (kosong($error_nama) && kosong($error_jenis) && kosong($error_nik) && kosong($error_alamat) && kosong($error_merk) && kosong($error_rangka) && kosong($error_tahun) && kosong($error_kodejenis)) {
			$nama = $nik = $jenis = $alamat = $merk = $rangka = $tahun = $kodejenis = '';
			$success = '<h3>DATA MASUK</h3>';
		}

	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Form sederhana</title>
</head>
<body>

	<form action="index.php" method="POST">
		<h2>ASET KENDARAAN</h2><hr>
		<h3>--- IDENTITAS ---</h3><br>
		<label>Nama Pemilik :</label>
		<input type="text" name="nama" value="<?= $nama; ?>">
		<div class="error"><?= $error_nama; ?></div>

		<label>Nomor Induk Keluarga (NIK) :</label>
		<input type="text" name="nik" value="<?= $nik; ?>">
		<div class="error"><?= $error_nik; ?></div>

		<label>Alamat :</label>
		<textarea name="alamat" ><?= $alamat; ?></textarea>
		<div class="error"><?= $error_alamat; ?></div>
		<hr>
		<h3>--- KENDARAAN ---</h3><br>
		
		<label for="jenis">Jenis kendaraan :</label>
		<select id="jenis" name="jenis">
			<option value="" <?php if ($jenis==""){echo 'selected';} ?> >[Pilih Jenis Kendaraan]</option>
			<option value="SEPEDA MOTOR" <?php if ($jenis=="SEPEDA MOTOR"){echo 'selected';} ?>>SEPEDA MOTOR</option>
			<option value="MOBIL" <?php if ($jenis=="MOBIL"){echo 'selected';}?>>MOBIL</option>
			<option value="PICK-UP" <?php if ($jenis=="PICK-UP"){echo 'selected';}?>>PICK-UP</option>
			<option value="TRUCK" <?php if ($jenis=="TRUCK"){echo 'selected';}?>>TRUCK</option>
			<option value="BUS" <?php if ($jenis=="BUS"){echo 'selected';}?>>BUS</option>
			<option value="KHUSUS" <?php if ($jenis=="KHUSUS"){echo 'selected';}?>>KHUSUS</option>
		</select>
		<div class="error"><?= $error_jenis; ?></div>

		<div class="sebaris">
		<label>Merek :</label>
		<input type="text" name="merk" value="<?= $merk; ?>">
		<div class="error"><?= $error_merk; ?></div>
		<div class="tengah"></div>
		<label>Tahun :</label>
		<input type="text" name="tahun" value="<?= $tahun; ?>">
		<div class="error"><?= $error_tahun; ?></div>
		</div>

		<label>Kode Jenis :</label>
		<input type="text" name="kodejenis" value="<?= $kodejenis; ?>">
		<div class="error"><?= $error_kodejenis; ?></div>

		<label>Nomor Rangka :</label>
		<input type="text" name="rangka" value="<?= $rangka; ?>">
		<div class="error"><?= $error_rangka; ?></div>

		<!-- <div class="sebaris">
		<input type="radio" id="baru" name="kondisi" value="baru">
		<label for="baru">Baru</label>
		<div class="tengah"></div>
		<input type="radio" id="bekas" name="kondisi" value="bekas">
		<label for="bekas">Bekas</label>
		</div>
		<div class="error"><?= $error_kondisi; ?></div>
 -->

		<button type="submit" name="submit">Submit</button>
		<div class="success"><?= $success; ?></div>
	</form>
	
</body>
</html>

