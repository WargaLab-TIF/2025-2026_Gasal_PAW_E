<?php 

require_once "function.php";

$nama = $jenis = $merek = $tahun = $plat = $harga = "";
$err_nama = $err_jenis = $err_merek = $err_tahun = $err_plat = $err_harga = $err_kondisi = ""; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nama = test_input($_POST['nama']);
	$jenis = test_input($_POST['jenis']);
	$merek = test_input($_POST['merek']);
	$tahun = test_input($_POST['tahun']);
	$plat = test_input($_POST['plat']);
	$harga = test_input($_POST['harga']);
	$kondisi = test_input($_POST['kondisi']);


	if (!wajib_isi($nama)) {
		$err_nama = 'Masukkan nama anda';
	}elseif (!alfabet($nama)) {
		$err_nama = 'Nama harus alfabet';
	}

	if (!wajib_isi($jenis)) {
		$err_jenis = 'masukkan jenis kendaraan';
	}elseif (!alfabet($jenis)) {
		$err_jenis = 'Jenis harus alfabet';
	}

	if (!wajib_isi($merek)) {
		$err_merek = 'Masukkan merek kendaraan';
	}elseif (!alfanumerik($merek)) {
		$err_merek = 'Merek harus alfabet';
	}

	if (!wajib_isi($tahun)) {
		$err_tahun = 'Masukkan tahun pembuatan';
	}elseif (!numerikbts($tahun)) {
		$err_tahun = 'Tahun harus numerik & 4 digit';
	}

	if (!wajib_isi($plat)) {
		$err_plat = 'Masukkan nomor plat kendaraan';
	}elseif (!alfanumerikbts($plat)) {
		$err_plat = 'Format plat tidak valid. Contoh: M1234CD atau M 1234 CD';
	}

	if (!wajib_isi($harga)) {
		$err_harga = 'Masukkan nilai kendaraan';
	}elseif (!numerik($harga)) {
		$err_harga = 'Nilai harus numerik';
	}

	if (!wajib_isi($kondisi)) {
		$err_kondisi = 'Pilih kondisi kendaraan.';
	}


	if (empty($err_nama) && empty($err_jenis) && empty($err_merek) && empty($err_tahun) && empty($err_plat) && empty($err_harga) && empty($err_kondisi)) {
		$sukses = 'DATA BERHASIL DIKIRIM';
		$nama = $jenis = $merek = $tahun = $plat = $harga = "";

	}

}

 ?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Pendataan Aset Kendaraan</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="container">
	<h1>Form Pendataan Aset Kendaraan</h1>

	<?php if (!empty($sukses)) : ?>
        <div class="success"><?= $sukses ?></div>
    <?php endif; ?>

	<form action="index.php" method="POST">
		<label>Nama Pemilik</label>
		<input type="text" name="nama" placeholder="Contoh: Muhammad Ammar" value="<?= $nama; ?>">
		<div class="error"><?= $err_nama; ?></div>

		<label>Jenis Kendaraan</label>
		<input type="text" name="jenis" placeholder="Contoh: Mobil, Motor" value="<?= $jenis; ?>"> 
		<div class="error"><?= $err_jenis; ?></div>

		<label>Merek / Model</label>
		<input type="text" name="merek" placeholder="Contoh: Mercedes Benz C 300" value="<?= $merek; ?>">
		<div class="error"><?= $err_merek; ?></div>

		<label>Tahun Pembuatan</label>
		<input type="text" name="tahun" placeholder="Contoh: 2019" value="<?= $tahun; ?>">
		<div class="error"><?= $err_tahun; ?></div>

		<label>Nomor Plat</label>
		<input type="text" name="plat" placeholder="Contoh: M 2039 JD" value="<?= $plat; ?>">
		<div class="error"><?= $err_plat; ?></div>

		<label>Nilai Kendaraan (IDR)</label>
		<input type="text" name="harga"  placeholder="Contoh: 200000000" value="<?= $harga;?>">
		<div class="error"><?= $err_harga;?></div>

		<label>Kondisi Kendaraan</label>
		<select name="kondisi">
			<option value="">-- Pilih Kondisi --</option>
			<option value="baik">Baik</option>
			<option value="rusak ringan">Rusak ringan</option>
			<option value="rusak berat">Rusak berat</option>
			<option value="tidak layak">Tidak layak pakai</option>
		</select>
		<div class="error"><?= $err_kondisi;?></div>

		<button type="submit">submit</button>
	</form>
	</div>
</body>
</html>