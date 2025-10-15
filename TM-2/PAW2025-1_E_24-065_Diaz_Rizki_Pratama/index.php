<?php

require_once 'function.php';

$namaPembeli = $nikPembeli = $email = $alamatPembeli = $telefonPembeli = $pekerjaan = "";
$namaPenjual = $nikPenjual = $telefonPenjual = "";
$noSertifikat = $luas = $harga = $hakKepemilikan = $lokasi = "";

$savePembeli = $saveNikPembeli = $saveEmail = $saveAlamatPembeli = $saveTelefonPembeli = $savePekerjaan = "";
$savePenjual = $saveNikPenjual = $saveTelefonPenjual = "";
$saveSertifikat = $saveLuas = $saveHarga = $saveHakKepemilikan = $saveLokasi = "";

$showForm = true;
if (isset($_POST['submit'])) {

	// INI BAGIAN PEMBELI
	$savePembeli = $_POST['namaPembeli'];
	$saveNikPembeli = $_POST['nikPembeli'];
	$saveEmail = $_POST['email'];
	$saveAlamatPembeli = $_POST['alamatPembeli'];
	$saveTelefonPembeli = $_POST['telefonPembeli'];
	$savePekerjaan = $_POST['pekerjaan'];

	// INI BAGIAN PENJUAL
	$savePenjual = $_POST['namaPenjual'];
	$saveNikPenjual = $_POST['nikPenjual'];
	$saveTelefonPenjual = $_POST['telefonPenjual'];

	// INI BAGIAN INFORMASI TANAH
	$saveSertifikat = $_POST['noSertifikat'];
	$saveLuas = $_POST['luas'];
	$saveHarga = $_POST['harga'];
	$saveLokasi = $_POST['lokasi'];
	$saveHakKepemilikan = $_POST['hakKepemilikan'];

	// INI UNTUK DATA PEMBELI
	if (empty($savePembeli)) {
		$namaPembeli = "Wajib mengisi field!";
	} elseif (!validasiNama($savePembeli)) {
		$namaPembeli = "Nama tidak valid!";
	}

	if (empty($saveNikPembeli)) {
    	$nikPembeli = "Wajib mengisi field!";
	} elseif (!validasiNik($saveNikPembeli)) {
    	$nikPembeli = "NIK tidak valid harus 16 digit angka!";
	}

	if (empty($saveAlamatPembeli)) {
		$alamatPembeli = "Wajib mengisi field!";
	} elseif (!validasiAlamat($saveAlamatPembeli)) {
		$alamatPembeli = "Alamat tidak Valid, minimal 2 karakter dan maksimal 50 karakter!";
	}
	
	if (empty($saveTelefonPembeli)) {
		$telefonPembeli = "Wajib mengisi field!";
	} elseif (!validasiTelefon($saveTelefonPembeli)) {
		$telefonPembeli = "No. Telefon harus dengan format yang sesuai! (10–13 angka)";
	}
	if (empty($saveEmail)) {
		$email = "Wajib mengisi field!";
	} elseif (!validasiEmail($saveEmail)){
		$email = "Email tidak valid!";
	}

	if (empty($savePekerjaan)){
		$pekerjaan = "Wajib mengisi field!";
	}

	// INI UNTUK DATA PENJUAL
	if (empty($savePenjual)) {
		$namaPenjual = "Wajib mengisi field!";
	} elseif (!validasiNama($savePenjual)) {
		$namaPenjual = "Nama tidak valid!";
	}

	if (empty($saveNikPenjual)) {
		$nikPenjual = "Wajib mengisi field!";
	} elseif (!validasiNik($saveNikPenjual)) {
		$nikPenjual = "NIK tidak valid harus 16 digit angka!";
	}

	if (empty($saveTelefonPenjual)) {
		$telefonPenjual = "Wajib mengisi field!";
	} elseif (!validasiTelefon($saveTelefonPenjual)) {
		$telefonPenjual = "No. Telefon harus dengan format yang sesuai! (10-13 angka)";
	}

	// INI DATA INFORMASI TANAH
	if (empty($saveSertifikat)) {
		$noSertifikat = "Wajib mengisi field!";
	} elseif (!validasiSertifikat($saveSertifikat)) {
		$noSertifikat = "input harus sesuai format dan numeric!";
	}

	if (empty($saveLuas)) {
		$luas = "Wajib mengisi field!";
	} elseif (!validasiLuasDanHarga($saveLuas)) {
		$luas = "input dengan format numeric!";
	}

	if (empty($saveHakKepemilikan)){
		$hakKepemilikan = "Wajib mengisi field!";
	}

	if (empty($saveHarga)) {
		$harga = "Wajib mengisi field!";
	} elseif (!validasiLuasDanHarga($saveHarga)) {
		$harga = "input dengan format numeric!";
	}

	if (empty($saveLokasi)) {
		$lokasi = "Wajib mengisi field!";
	} elseif (!validasiAlamat($saveLokasi)) {
		$lokasi = "Alamat tidak valid, minimal 2 karakter dan maksimal 50 karakter!";
	}

	if (
		empty($namaPembeli) && empty($nikPembeli) && empty($alamatPembeli) && empty($telefonPembeli) && empty($pekerjaan)&&
		empty($namaPenjual) && empty($nikPenjual) && empty($telefonPenjual) &&
		empty($noSertifikat) && empty($luas) && empty($harga) && empty($lokasi) && empty($hakKepemilikan)
		) {
		$showForm = false;
		}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Sederhana</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php if ($showForm): ?>

		<form method="POST">
			<div class="form-header">
				<h1 class="form-header-title">Form Jual Beli Tanah</h1>
			</div>
			<fieldset>
				<legend>Data pembeli</legend>

				<label>Nama pembeli:</label>
				<input type="text" name="namaPembeli" value="<?= $savePembeli ?>" placeholder="input dengan format alphabet">
				<div class="error"><?= $namaPembeli ?></div>

				<label>NIK Pembeli:</label>
				<input type="text" name="nikPembeli" value="<?= $saveNikPembeli ?>" placeholder="input dengan format numeric dan wajib 16 angka">
				<div class="error"><?= $nikPembeli ?></div>

				<label>Alamat Pembeli:</label>
				<input type="text" name="alamatPembeli" value="<?= $saveAlamatPembeli ?>" placeholder="input boleh numeric atau alphabet dengan batas 50 karakter">
				<div class="error"><?= $alamatPembeli ?></div>

				<label>No. Telefon Pembeli:</label>
				<input type="text" name="telefonPembeli" value="<?= $saveTelefonPembeli ?>" placeholder="input dengan format numeric dan wajib 10-13 angka">
				<div class="error"><?= $telefonPembeli ?></div>

				<label>Email Pembeli:</label>
				<input type="text" name="email" value="<?= $saveEmail ?>" placeholder="input sesuai ketentuan email example:diazxxxx@gmail.com">
				<div class="error"><?= $email ?></div>

				<label>Pekerjaan Pembeli:</label>
				<select name="pekerjaan">
					<option value="">Pilih pekerjaan</option>
					<option value="pns" <?php if ($savePekerjaan == "pns") echo 'selected'; ?>>PNS</option>
					<option value="petani"<?php if ($savePekerjaan == "petani") echo 'selected'; ?>>Petani</option>
					<option value="nakes" <?php if ($savePekerjaan == "nakes") echo 'selected'; ?>>Tenaga Kesehatan</option>
					<option value="buruh" <?php if ($savePekerjaan == "buruh") echo 'selected'; ?>>Buruh</option>
					<option value="nelayan" <?php if ($savePekerjaan == "nelayan") echo 'selected'; ?>>Nelayan</option>
				</select>
				<div class="error"><?= $pekerjaan ?></div>
			</fieldset><br>

			<fieldset>
				<legend>Data Penjual</legend>

				<label>Nama Penjual:</label>
				<input type="text" name="namaPenjual" value="<?= $savePenjual ?>" placeholder="Masukkan dengan format alphabet">
				<div class="error"><?= $namaPenjual ?></div>

				<label>NIK Penjual:</label>
				<input type="text" name="nikPenjual" value="<?= $saveNikPenjual ?>" placeholder="input dengan format numeric dan wajib 16 angka">
				<div class="error"><?= $nikPenjual ?></div>


				<label>No. Telefon Penjual:</label>
				<input type="text" name="telefonPenjual" value="<?= $saveTelefonPenjual ?>" placeholder="input dengan format numeric dan wajib 10-13 angka">
				<div class="error"><?= $telefonPenjual ?></div>


			</fieldset> <br>

			<fieldset>
				<legend>Data Informasi Tanah</legend>

				<label>No. Sertifikat:</label>
				<input type="text" name="noSertifikat" value="<?= $saveSertifikat ?>" placeholder="input dengan numeric dan sesuai format. Example: 11.11.11.11.1.12345">
				<div class="error"><?= $noSertifikat ?></div>

				<label>Luas Tanah: (m²)</label>
				<input type="text" name="luas" value="<?= $saveLuas ?>" placeholder="input dengan format numeric">
				<div class="error"><?= $luas ?></div>

				<label>Lokasi:</label>
				<input type="text" name="lokasi" value="<?= $saveLokasi ?>" placeholder="input boleh numeric atau alphabet dengan batas 50 karakter">
				<div class="error"><?= $lokasi ?></div>

				<label>Hak Kepemilikan:</label>
				<select name="hakKepemilikan">
					<option value="">Pilih hak Kepemilikan</option>
					<option value="HM" <?php if ($saveHakKepemilikan == "HM") echo 'selected'; ?>>Hak Milik</option>
					<option value="HGU" <?php if ($saveHakKepemilikan == "HGU") echo 'selected'; ?>>Hak Guna Usaha</option>
					<option value="HGB" <?php if ($saveHakKepemilikan == "HGB") echo 'selected'; ?>>Hak Guna Bangunan</option>
					<option value="HP" <?php if ($saveHakKepemilikan == "HP") echo 'selected'; ?>>Hak Pakai</option>
					<option value="HS" <?php if ($saveHakKepemilikan == "HS") echo 'selected'; ?>>Hak Sewa</option>
				</select><br>
				<div class="error"><?= $hakKepemilikan ?></div>

				<label>Harga NJOP:</label>
				<input type="text" name="harga" value="<?= $saveHarga ?>" placeholder="input dengan format numeric">
				<div class="error"><?= $harga ?></div>
			</fieldset>

			<button type="submit" name="submit">Kirim</button>
		</form>
	<?php else: ?>
		<div class="success-box">
			<h1 class="success-title">Berhasil Terkirim!</h1>
			<p class="success-message">Data transaksi tanah Anda telah berhasil kami terima dan akan segera diproses.</p>
		</div>
	<?php endif; ?>
</body>

</html>