<?php
require_once 'fungsi.php';

$nama = $telepon = $alamat = $ktp = '';
$namaPembeli = $alamatPembeli = $pekerjaanPembeli = $teleponPembeli = $ktpPembeli = '';
$atasNama = $luas = $letak = $harga = $sertif = '';

$error_nama = $error_telepon = $error_alamat  = $error_ktp = '';
$error_namaPembeli =  $error_alamatPembeli = $error_pekerjaanPembeli = $error_teleponPembeli = $error_ktpPembeli = '';
$error_atasNama = $error_luas = $error_letak = $error_harga = $error_sertif = '';

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST['nama']);
	$telepon = test_input($_POST['telepon']);
	$alamat = test_input($_POST['alamat']);
	$ktp = test_input($_POST['ktp']);

	$namaPembeli = test_input($_POST['namaPembeli']);
	$alamatPembeli = test_input($_POST['alamatPembeli']);
	$pekerjaanPembeli = test_input($_POST['pekerjaanPembeli']);
	$teleponPembeli = test_input($_POST['teleponPembeli']);
	$ktpPembeli = test_input($_POST['ktpPembeli']);

	$atasNama = test_input($_POST['atasNama']);
	$luas = test_input($_POST['luas']);
	$letak = test_input($_POST['letak']);
	$harga = test_input($_POST['harga']);
	$sertif = test_input($_POST['sertif']);

	//DATA PENJUAL
	if (!wajib_isi($nama)) {
		$error_nama = "Masukkan wajib di isi";
	}elseif (!alfabet($nama)) {
		$error_nama = "Format nama tidak valid";
	}

	if (!wajib_isi($telepon)) {
		$error_telepon = "Masukkan wajib di isi";
	}elseif (!valTelpon($telepon)) {
		$error_telepon = "Format No. telepon tidak valid";
	}

	if (!wajib_isi($ktp)) {
		$error_ktp = "Masukkan wajib di isi";
	}elseif (!valKtp($ktp)) {
		$error_ktp = "Masukkan format numerik";
	}

	if (!wajib_isi($alamat)) {
		$error_alamat = "Masukkan wajib di isi";
	}elseif (!valAlamat($alamat)) {
		$error_alamat = "Format alamat tidak valid";
	}

	// DATA PEMBELI
	if (!wajib_isi($namaPembeli)) {
		$error_namaPembeli = "Masukkan wajib di isi";
	}elseif (!alfabet($namaPembeli)) {
		$error_namaPembeli = "Masukkan wajib alfabet";
	}

	if (!wajib_isi($pekerjaanPembeli)) {
		$error_pekerjaanPembeli = "Masukkan wajib di isi";
	}elseif (!alfabet($pekerjaanPembeli)) {
		$error_pekerjaanPembeli = "Masukkan wajib alfabet";
	}

	if (!wajib_isi($alamatPembeli)) {
		$error_alamatPembeli = "Masukkan wajib di isi";
	}elseif (!valAlamat($alamatPembeli)) {
		$error_alamatPembeli = "Format alamat tidak valid";
	}

	if (!wajib_isi($teleponPembeli)) {
		$error_teleponPembeli = "Masukkan wajib di isi";
	}elseif (!valTelpon($teleponPembeli)) {
		$error_teleponPembeli = "Format No. telepon tidak valid";
	}

	if (!wajib_isi($ktpPembeli)) {
		$error_ktpPembeli = "Masukkan wajib di isi";
	}elseif (!valKtp($ktpPembeli)) {
		$error_ktpPembeli = "Masukkan format numerik";
	}

	// INFORMASI TANAH
	if (!wajib_isi($atasNama)) {
		$error_atasNama = "Masukkan wajib di isi";
	}elseif (!alfabet($atasNama)) {
		$error_atasNama = "Masukkan wajib alfabet";
	}

	if (!wajib_isi($luas)) {
		$error_luas = "Masukkan wajib di isi";
	}elseif (!numerik($luas)) {
		$error_luas = "Masukkan format numerik";
	}

	if (!wajib_isi($letak)) {
		$error_letak = "Masukkan wajib di isi";
	}elseif (!alfabet($letak)) {
		$error_letak = "Masukkan format alfabet";
	}

	if (!wajib_isi($sertif)) {
		$error_sertif = "Masukkan wajib di isi";
	}elseif (!valSertif($sertif)) {
		$error_sertif = "Masukkan format numerik";
	}

	if (!wajib_isi($harga)) {
		$error_harga = "Masukkan wajib di isi";
	}elseif (!numerik($harga)) {
		$error_harga = "Masukkan format numerik";
	}


	if(empty($error_nama) && empty($error_telepon) && empty($error_alamat) && empty($error_ktp) && empty($error_namaPembeli) && empty($error_pekerjaanPembeli) && empty($error_alamatPembeli) && empty($error_teleponPembeli) && empty($error_ktpPembeli) && empty($error_atasNama) && empty($error_luas) && empty($error_letak) && empty($error_sertif) && empty($error_harga)) {
		$pesan = "Berhasil Memasukkan Data";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="tampilan.css">

</head>
<body>
	<?php if (!empty($pesan)) : ?>
		<p><?= $pesan ?></p>
	<?php endif; ?>
	<div class="container">
	<form action="#" method="POST">
		<h2>Pendataan Informasi Jual Beli Tanah</h2>
		<fieldset>
			<legend></legend>
			<h3>Data Pembeli</h3>
			<div class="form-group">
				<label>Nama Lengkap:</label>
				<input type="text" name="namaPembeli" value="<?=$namaPembeli?>">
				<div class="error"><?php echo $error_namaPembeli ?></div>
			</div>

			<div class="form-group">
				<label>Pekerjaan:</label>
				<input type="text" name="pekerjaanPembeli" value="<?=$pekerjaanPembeli?>">
				<div class="error"><?php echo $error_pekerjaanPembeli ?></div>
			</div>

			<div class="form-group"> 
				<label>Alamat:</label>
				<input type="text" name="alamatPembeli" value="<?=$alamatPembeli?>">
				<div class="error"><?php echo $error_alamatPembeli ?></div>
			</div>

			<div class="form-group">
				<label>Telephone:</label>
				<input type="text" name="teleponPembeli" value="<?=$teleponPembeli?>">
				<div class="error"><?php echo $error_teleponPembeli?></div>
			</div>

			<div class="form-group">
				<label>NIK:</label>
				<input type="text" name="ktpPembeli" value="<?=$ktpPembeli?>">
				<div class="error"><?php echo $error_ktpPembeli ?></div>
			</div>
		</fieldset>
		<fieldset>
			<legend></legend>
			<h3>Data Penjual</h3>
			<div class="form-group">
				<label>Nama Lengkap:</label>
				<input type="text" name="nama" value="<?=$nama?>">
				<div class="error"><?php echo $error_nama ?></div>
			</div>

			<div class="form-group">
				<label>Alamat:</label>
				<input type="text" name="alamat" value="<?=$alamat?>">
				<div class="error"><?php echo $error_alamat ?></div>
			</div>

			<div class="form-group">
				<label>Telephon:</label>
				<input type="text" name="telepon" value="telepon">
				<div class="error"><?php echo $error_telepon ?></div>
			</div>

			<div class="form-group">
				<label>NIK:</label>
				<input type="text" name="ktp" value="<?=$ktp?>">
				<div class="error"><?php echo $error_ktp ?></div>
			</div>
		</fieldset>
		<fieldset>
			<legend></legend>
			<h3>Keterangan Tanah</h3>
			<div class="form-group">
				<label>Atas nama:</label>
				<input type="text" name="atasNama" value="<?=$atasNama?>">
				<div class="error"><?php echo $error_atasNama ?></div>
			</div>
			
			<div class="form-group">
				<label>Luas Tanah:</label>
				<input type="text" name="luas" value="<?=$luas?>">
				<div class="error"><?php echo $error_luas ?></div>
			</div>

			<div class="form-group">
				<label>Letak Tanah:</label>
				<input type="text" name="letak" value="<?=$letak?>">
				<div class="error"><?php echo $error_letak ?></div>
			</div>

			<div class="form-group">
				<label>Nomor Sertifikat:</label>
				<input type="text" name="sertif" value="<?=$sertif?>">
				<div class="error"><?php echo $error_sertif ?></div>
			</div>

			<div class="form-group">
				<label>Harga:</label>
				<input type="text" name="harga" value="<?=$harga?>">
				<div class="error"><?php echo $error_harga ?></div>
			</div>
		</fieldset>
		<div class="form-group">
			<button type="submit">Kirim</button>
		</div>
	</form>
	</div>
	
</body>
</html>