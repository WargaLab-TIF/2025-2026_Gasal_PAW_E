<?php

require_once 'functiontm2.php';

$nama = $NIK = $agama = $kelahiran = $kelamin = $alamat = $telepon = $email = $pendidikan = $status_pegawai = $jabatan = $lama_bekerja = $gaji = '';
$error_nama = $error_NIK = $error_agama = $error_kelahiran = $error_kelamin = $error_alamat = $error_telepon = $error_email = $error_pendidikan = $error_status_pegawai = $error_jabatan = $error_lama_bekerja = $error_gaji = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST ['nama']?? '');
	$NIK = test_input($_POST ['NIK']?? '');
	$agama = test_input($_POST ['agama']?? '');
	$kelahiran = test_input($_POST ['kelahiran']?? '');
	$kelamin = test_input($_POST ['kelamin']?? '');
	$alamat = test_input($_POST ['alamat']?? '');
	$telepon = test_input($_POST ['telepon']?? '');
	$email = test_input($_POST ['email']?? '');
	$pendidikan = test_input($_POST ['pendidikan']?? '');
	$status_pegawai = test_input($_POST ['status_pegawai']?? '');
	$jabatan = test_input($_POST ['jabatan']?? '');
	$lama_bekerja = test_input($_POST ['lama_bekerja']?? '');
	$gaji = test_input($_POST ['gaji']?? '');
	
	if (!wajib_isi($nama)) {
		$error_nama ="masukkan wajib di isi";
	}elseif (!alfabet($nama)) {
		$error_nama = "Masukkan wajib alfabet";
	}elseif (strlen($nama) < 3 || strlen($nama) >= 30 ){
		$error_nama = "Masukkan nama minimal 3 huruf";
	}

	if (!wajib_isi($NIK)) {
		$error_NIK = "masukkan wajib diisi";
	}elseif (!is_numerik($NIK)) {
		$error_NIK = "Masukkan wajib numerik";
	}elseif (strlen($NIK) !== 16 ){
		$error_NIK = "Masukkan harus berjumlah 16 digit";
	}
	if (!wajib_isi($agama)) {
        $error_agama = "Agama wajib dipilih";
    }

	if (!wajib_isi($kelahiran)) {
		$error_kelahiran = "masukkan wajib diisi";
	}
	if (!wajib_isi($kelamin)) {
		$error_kelamin = "masukkan wajib diisi";
	}

	if (!wajib_isi($alamat)) {
    $error_alamat = "masukkan wajib diisi";
	} elseif (!alamat($alamat)) {
    $error_alamat = "Alamat harus kombinasi huruf dan angka";
	} elseif (strlen($alamat) < 8 || strlen($alamat) > 50) {
    $error_alamat = "Masukkan harus lebih dari 8 karakter";
	}

	 if (!wajib_isi($telepon)) {
        $error_telepon = "Nomor telepon wajib diisi";
    } elseif (!is_numerik($telepon)) {
        $error_telepon = "Nomor telepon harus angka";
    } elseif (strlen($telepon) < 8 || strlen($telepon) > 15) {
        $error_telepon = "Nomor telepon harus antara 8 sampai 15 digit";
    }

	if (!wajib_isi($email)) {
		$error_email="masukkan wajib di isi";
	}elseif (!email($email)) {
		$error_email= "Masukkan format email dengan benar";
	}
	 if (!wajib_isi($pendidikan)) {
        $error_pendidikan = "Pendidikan wajib dipilih";
    }

    if (!wajib_isi($status_pegawai)) { $error_status_pegawai = "Status kepegawaian wajib dipilih";
	}

    if (!wajib_isi($jabatan)) {
    $error_jabatan = "Silakan pilih jabatan pegawai";
	}

    if (!wajib_isi($lama_bekerja)) {
        $error_lama_bekerja = "Lama bekerja wajib diisi";
    } elseif (!is_numerik($lama_bekerja)) {
        $error_lama_bekerja = "Lama bekerja harus angka (dalam tahun)";
    } elseif (strlen($lama_bekerja) > 1) {
        $error_lama_bekerja = "Maksimal 1 digit";
    } 

    if (!wajib_isi($gaji)) {
        $error_gaji = "Kisaran gaji wajib dipilih";
    }

	if (
    empty($error_nama) && empty($error_NIK) && empty($error_agama) &&
    empty($error_kelahiran) && empty($error_kelamin) && empty($error_alamat) &&
    empty($error_telepon) && empty($error_email) && empty($error_pendidikan) &&
    empty($error_status_pegawai) && empty($error_jabatan) && empty($error_lama_bekerja) &&
    empty($error_gaji)) {
    	header("Location: succestm2.php?status=berhasil");
    exit;
	}

}

?>


<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendataan Kepegawaian</title>
	<link rel="stylesheet" href="tm2.css?v=2">
</head>
<body>
	<form method="POST">
		<h2>Pendataan Informasi Kepegawaian</h2><br>

	<label>Nama Pegawai: </label>
	<input type="text" name="nama" value="<?= $nama ?>">
	<div class="error"><?= $error_nama ?></div>

	<label>NIK: </label>
	<input type="text" name="NIK" value="<?= $NIK?>">
	<div class="error"><?= $error_NIK ?></div>

	<label>Agama:</label>
    <select name="agama">
        <option value="">Silahkan Pilih Agama:</option>
        <option value="Islam" <?= ($agama == "Islam") ? 'selected' : '' ?>>Islam</option>
        <option value="Kristen" <?= ($agama == "Kristen") ? 'selected' : '' ?>>Kristen</option>
        <option value="Hindu" <?= ($agama == "Hindu") ? 'selected' : '' ?>>Hindu</option>
        <option value="Buddha" <?= ($agama == "Buddha") ? 'selected' : '' ?>>Buddha</option>
        <option value="Katolik" <?= ($agama == "Katolik") ? 'selected' : '' ?>>Katolik</option>
        <option value="Konghucu" <?= ($agama == "Konghucu") ? 'selected' : '' ?>>Konghucu</option>
    </select>
    <div class="error"><?= $error_agama ?></div><br>

	<label>Tanggal Lahir: </label>
	<input type="DATE" name="kelahiran" value="<?= $kelahiran?>">
	<div class="error"><?= $error_kelahiran ?></div>

	<label>Jenis Kelamin:</label>
	<div class="jenis-kelamin">
    <input type="radio" id="perempuan" name="kelamin" value="perempuan" <?= ($kelamin == 'perempuan') ? 'checked' : '' ?>>
    <label for="perempuan">Perempuan</label>

    <input type="radio" id="lakiLaki" name="kelamin" value="laki-laki" <?= ($kelamin == 'laki-laki') ? 'checked' : '' ?>>
    <label for="lakiLaki">Laki-laki</label>
	</div>
	<div class="error"><?= $error_kelamin ?></div>

	<label>Alamat:</label>
	<input type="text" name="alamat" value="<?= $alamat?>">
	<div class="error"><?= $error_alamat?></div>

	<label>Nomor Telepon:</label>
	<input type="text" name="telepon" value="<?= $telepon?>">
	<div class="error"><?= $error_telepon ?></div>

	<label>Email:</label>
	<input type="text" name="email" value="<?= $email ?>">
	<div class="error"><?= $error_email?></div>

	<label>Status Pendidikan Terakhir:</label>
    <select name="pendidikan">
        <option value="">Silahkan Pilih Pendidikan Terakhir</option>
        <option value="SD" <?= ($pendidikan == "SD") ? 'selected' : '' ?>>SD</option>
        <option value="SMP" <?= ($pendidikan == "SMP") ? 'selected' : '' ?>>SMP</option>
        <option value="SMA" <?= ($pendidikan == "SMA") ? 'selected' : '' ?>>SMA</option>
        <option value="D3" <?= ($pendidikan == "D3") ? 'selected' : '' ?>>D3</option>
        <option value="D4" <?= ($pendidikan == "D4") ? 'selected' : '' ?>>D4</option>
        <option value="S1" <?= ($pendidikan == "S1") ? 'selected' : '' ?>>S1</option>
        <option value="S2" <?= ($pendidikan == "S2") ? 'selected' : '' ?>>S2</option>
        <option value="S3" <?= ($pendidikan == "S3") ? 'selected' : '' ?>>S3</option>
    </select>
    <div class="error"><?= $error_pendidikan ?></div><br>

     <label>Status Kepegawaian:</label> 
    <select name="status_pegawai"> 
    	<option value="">Silahkan Pilih Status kepegawaian</option> 
    	<option value="PNS" <?= ($status_pegawai == "PNS") ? 'selected' : '' ?>>PNS</option> 
    	<option value="Tetap" <?= ($status_pegawai == "Tetap") ? 'selected' : '' ?>>Tetap</option> 
    	<option value="Kontrak" <?= ($status_pegawai == "Kontrak") ? 'selected' : '' ?>>Kontrak</option> 
    	<option value="Honorer" <?= ($status_pegawai == "Honorer") ? 'selected' : '' ?>>Honorer</option> 
    	<option value="Magang" <?= ($status_pegawai == "Magang") ? 'selected' : '' ?>>Magang</option> 
    </select> 
    <div class="error"><?= $error_status_pegawai ?></div><br>

    <label>Jabatan Saat Ini:</label>
<select name="jabatan">
    <option value="">Silahkan Pilih Jabatan</option>
    <optgroup label="Manajemen Atas">
        <option value="Direktur" <?= ($jabatan == "Direktur") ? 'selected' : '' ?>>Direktur</option>
        <option value="Wakil Direktur" <?= ($jabatan == "Wakil Direktur") ? 'selected' : '' ?>>Wakil Direktur</option>
        <option value="Manajer Umum" <?= ($jabatan == "Manajer Umum") ? 'selected' : '' ?>>Manajer Umum</option>
    </optgroup>

    <optgroup label="Manajerial Menengah">
        <option value="Kepala Bagian" <?= ($jabatan == "Kepala Bagian") ? 'selected' : '' ?>>Kepala Bagian</option>
        <option value="Supervisor" <?= ($jabatan == "Supervisor") ? 'selected' : '' ?>>Supervisor</option>
        <option value="Koordinator" <?= ($jabatan == "Koordinator") ? 'selected' : '' ?>>Koordinator</option>
    </optgroup>

    <optgroup label="Staf Operasional">
        <option value="Staf Administrasi" <?= ($jabatan == "Staf Administrasi") ? 'selected' : '' ?>>Staf Administrasi</option>
        <option value="Staf Keuangan" <?= ($jabatan == "Staf Keuangan") ? 'selected' : '' ?>>Staf Keuangan</option>
        <option value="Staf HRD" <?= ($jabatan == "Staf HRD") ? 'selected' : '' ?>>Staf HRD</option>
        <option value="Staf IT" <?= ($jabatan == "Staf IT") ? 'selected' : '' ?>>Staf IT</option>
        <option value="Staf Produksi" <?= ($jabatan == "Staf Produksi") ? 'selected' : '' ?>>Staf Produksi</option>
    </optgroup>

    <optgroup label="Teknis / Profesional">
        <option value="Programmer" <?= ($jabatan == "Programmer") ? 'selected' : '' ?>>Programmer</option>
        <option value="Desainer" <?= ($jabatan == "Desainer") ? 'selected' : '' ?>>Desainer</option>
        <option value="Teknisi" <?= ($jabatan == "Teknisi") ? 'selected' : '' ?>>Teknisi</option>
        <option value="Analis Data" <?= ($jabatan == "Analis Data") ? 'selected' : '' ?>>Analis Data</option>
    </optgroup>

    <optgroup label="Lain-lain">
        <option value="Customer Service" <?= ($jabatan == "Customer Service") ? 'selected' : '' ?>>Customer Service</option>
        <option value="Security" <?= ($jabatan == "Security") ? 'selected' : '' ?>>Security</option>
        <option value="Office Boy" <?= ($jabatan == "Office Boy") ? 'selected' : '' ?>>Office Boy</option>
    </optgroup>
</select>
<div class="error"><?= $error_jabatan ?></div>


    <label>Lama Bekerja (dalam tahun):</label>
    <input type="text" name="lama_bekerja" value="<?= $lama_bekerja ?>">
    <div class="error"><?= $error_lama_bekerja ?></div>

    <label>Gaji:</label>
    <select name="gaji">
        <option value="">Silahkan Pilih Kisaran Gaji</option>
        <option value="0-500.000" <?= ($gaji == "0-500.000") ? 'selected' : '' ?>>0 - 500.000</option>
        <option value="500.000-1.000.000" <?= ($gaji == "500.000-1.000.000") ? 'selected' : '' ?>>500.000 - 1.000.000</option>
        <option value="1.000.000-1.500.000" <?= ($gaji == "1.000.000-1.500.000") ? 'selected' : '' ?>>1.000.000 - 1.500.000</option>
        <option value="1.500.000-2.000.000" <?= ($gaji == "1.500.000-2.000.000") ? 'selected' : '' ?>>1.500.000 - 2.000.000</option>
        <option value="2.000.000-2.500.000" <?= ($gaji == "2.000.000-2.500.000") ? 'selected' : '' ?>>2.000.000 - 2.500.000</option>
        <option value="2.500.000-3.000.000" <?= ($gaji == "2.500.000-3.000.000") ? 'selected' : '' ?>>2.500.000 - 3.000.000</option>
        <option value="3.000.000-3.500.000" <?= ($gaji == "3.000.000-3.500.000") ? 'selected' : '' ?>>3.000.000 - 3.500.000</option>
        <option value="3.500.000-4.000.000" <?= ($gaji == "3.500.000-4.000.000") ? 'selected' : '' ?>>3.500.000 - 4.000.000</option>
        <option value=">5.000.000" <?= ($gaji == ">5.000.000") ? 'selected' : '' ?>> > 5.000.000</option>
    </select>
    <div class="error"><?= $error_gaji ?></div><br>

	<button type="submit">Kirim</button>
	</form>
</body>
</html>