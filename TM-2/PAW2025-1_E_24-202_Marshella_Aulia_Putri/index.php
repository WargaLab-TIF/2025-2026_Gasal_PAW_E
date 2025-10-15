<?php

require_once 'function.php';

$nama = $tanggal_lahir = $jenis = $agama = $identitas = $telepon = $email = $pendidikan = $status_pegawai = $jabatan  = $lama_bekerja = $gaji ='';

$error_nama = $error_tanggal_lahir = $error_jenis = $error_agama = $error_identitas = $error_telepon = $error_email = $error_pendidikan = $error_status_pegawai = $error_jabatan  = $error_lama_bekerja = $error_gaji ='';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis = $_POST['jenis'] ?? '';
    $agama = $_POST['agama'] ?? '';
    $identitas = $_POST['identitas'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $pendidikan = $_POST['pendidikan'] ?? '';
    $status_pegawai = $_POST['status_pegawai'] ?? '';
    $jabatan = $_POST['jabatan'];
    $lama_bekerja = $_POST['lama_bekerja'];
    $gaji = $_POST['gaji'] ?? '';


    if (!wajib_isi($nama)) {
        $error_nama = "Nama wajib diisi";
    } elseif (!alfabet($nama)) {
        $error_nama = "Nama wajib alfabet";
    } elseif (strlen($nama) < 5 ) {
    	$error_nama = "Minimal nama harus terdiri dari 5 karakter";
	}


    if (!wajib_isi($tanggal_lahir)) {
        $error_tanggal_lahir = "Tanggal lahir wajib diisi";
    }

    if (!wajib_isi($jenis)) {
        $error_jenis = "Jenis kelamin wajib dipilih";
    }

    if (!wajib_isi($agama)) {
        $error_agama = "Agama wajib dipilih";
    }

    if (!wajib_isi($identitas)) {
        $error_identitas = "Nomor identitas wajib diisi";
    } elseif (!is_numerik($identitas)) {
        $error_identitas = "Nomor identitas harus angka";
    } elseif (strlen($identitas) < 16 || strlen($identitas) > 16) {
    	$error_identitas = "Nomor identitas harus 16 digit";
	}

    if (!wajib_isi($telepon)) {
        $error_telepon = "Nomor telepon wajib diisi";
    } elseif (!is_numerik($telepon)) {
        $error_telepon = "Nomor telepon harus angka";
    } elseif (strlen($telepon) < 8 || strlen($telepon) > 15) {
        $error_telepon = "Nomor telepon harus antara 8 sampai 15 digit";
    }

    if (!wajib_isi($email)) {
        $error_email = "Email wajib diisi";
    } elseif (!email($email)) {
        $error_email = "Email format email yang benar";
    }

    if (!wajib_isi($pendidikan)) {
        $error_pendidikan = "Pendidikan wajib dipilih";
    }

    if (!wajib_isi($status_pegawai)) { $error_status_pegawai = "Status kepegawaian wajib dipilih"; }

    if (!wajib_isi($jabatan)) {
        $error_jabatan = "Jabatan atau posisi wajib diisi";
    } elseif (!alfabet($jabatan)) {
        $error_jabatan = "Jabatan hanya boleh huruf";
    } elseif (strlen($jabatan) < 3 || strlen($jabatan) > 30) {
        $error_jabatan = "Jabatan harus memiliki 3 hingga 30 karakter";
    }

    if (!wajib_isi($gaji)) {
        $error_gaji = "Kisaran gaji wajib dipilih";
    }

    if (!wajib_isi($lama_bekerja)) {
        $error_lama_bekerja = "Lama bekerja wajib diisi";
    } elseif (!is_numerik($lama_bekerja)) {
        $error_lama_bekerja = "Lama bekerja harus angka (dalam tahun)";
    } elseif (strlen($lama_bekerja) > 2) {
        $error_lama_bekerja = "Maksimal 2 digit";
    } 

    if (
        empty($error_nama) && empty($error_tanggal_lahir) && empty($error_jenis) && 
        empty($error_agama) && empty($error_identitas) && empty($error_telepon) &&
        empty($error_email)  &&
        empty($error_pendidikan) && empty($error_jabatan) && empty($error_status_pegawai) && empty($error_gaji) && empty($error_lama_bekerja) 
    ) {
        header("Location: sukses.html");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendataan Informasi Kepegawaian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="POST">

    <h2>Pendataan Informasi Kepegawaian</h2>
    <label>Nama Lengkap:</label>
    <input type="text" name="nama" value="<?= $nama ?>">
    <div class="error"><?= $error_nama ?></div>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>">
    <div class="error"><?= $error_tanggal_lahir ?></div>

    <label>Jenis Kelamin:</label>
    <input type="radio" name="jenis" value="Laki-laki" <?= ($jenis == "Laki-laki") ? 'checked' : '' ?>> Laki-laki
    <input type="radio" name="jenis" value="Perempuan" <?= ($jenis == "Perempuan") ? 'checked' : '' ?>> Perempuan
    <div class="error"><?= $error_jenis ?></div>

    <label>Agama:</label>
    <select name="agama">
        <option value="">Silahkan Pilih</option>
        <option value="Islam" <?= ($agama == "Islam") ? 'selected' : '' ?>>Islam</option>
        <option value="Kristen" <?= ($agama == "Kristen") ? 'selected' : '' ?>>Kristen</option>
        <option value="Katolik" <?= ($agama == "Katolik") ? 'selected' : '' ?>>Katolik</option>
        <option value="Hindu" <?= ($agama == "Hindu") ? 'selected' : '' ?>>Hindu</option>
        <option value="Buddha" <?= ($agama == "Buddha") ? 'selected' : '' ?>>Buddha</option>
        <option value="Konghucu" <?= ($agama == "Konghucu") ? 'selected' : '' ?>>Konghucu</option>
    </select>
    <div class="error"><?= $error_agama ?></div>

    <label>Nomor Identitas (KTP/NIK):</label>
    <input type="text" name="identitas" value="<?= $identitas ?>">
    <div class="error"><?= $error_identitas ?></div>

    <label>Nomor Telepon:</label>
    <input type="text" name="telepon" value="<?= $telepon ?>">
    <div class="error"><?= $error_telepon ?></div>

    <label>Email:</label>
    <input type="text" name="email" value="<?= $email ?>">
    <div class="error"><?= $error_email ?></div>

    <label>Pendidikan Terakhir:</label>
    <select name="pendidikan">
        <option value="">Silahkan Pilih</option>
        <option value="SD" <?= ($pendidikan == "SD") ? 'selected' : '' ?>>SD</option>
        <option value="SMP" <?= ($pendidikan == "SMP") ? 'selected' : '' ?>>SMP</option>
        <option value="SMA" <?= ($pendidikan == "SMA") ? 'selected' : '' ?>>SMA</option>
        <option value="S1" <?= ($pendidikan == "S1") ? 'selected' : '' ?>>S1</option>
        <option value="S2" <?= ($pendidikan == "S2") ? 'selected' : '' ?>>S2</option>
        <option value="S3" <?= ($pendidikan == "S3") ? 'selected' : '' ?>>S3</option>
    </select>
    <div class="error"><?= $error_pendidikan ?></div>

    <label>Status Kepegawaian:</label> 
    <select name="status_pegawai"> 
    	<option value="">Silahkan Pilih</option> 
    	<option value="PNS" <?= ($status_pegawai == "PNS") ? 'selected' : '' ?>>PNS</option> 
    	<option value="Kontrak" <?= ($status_pegawai == "Kontrak") ? 'selected' : '' ?>>Kontrak</option> 
    	<option value="Honorer" <?= ($status_pegawai == "Honorer") ? 'selected' : '' ?>>Honorer</option> 
    	<option value="Tetap" <?= ($status_pegawai == "Tetap") ? 'selected' : '' ?>>Tetap</option> 
    	<option value="Magang" <?= ($status_pegawai == "Magang") ? 'selected' : '' ?>>Magang</option> 
    </select> 
    <div class="error"><?= $error_status_pegawai ?></div>


    <label>Jabatan / Posisi Saat Ini:</label>
    <input type="text" name="jabatan" value="<?= $jabatan ?>">
    <div class="error"><?= $error_jabatan ?></div>

    <label>Gaji:</label>
    <select name="gaji">
        <option value="">Silahkan Pilih</option>
        <option value="0-500.000" <?= ($gaji == "0-500.000") ? 'selected' : '' ?>>0 - 500.000</option>
        <option value="500.000-1.500.000" <?= ($gaji == "500.000-1.500.000") ? 'selected' : '' ?>>500.000 - 1.500.000</option>
        <option value="1.500.000-3.000.000" <?= ($gaji == "1.500.000-3.000.000") ? 'selected' : '' ?>>1.500.000 - 3.000.000</option>
        <option value="3.000.000-5.000.000" <?= ($gaji == "3.000.000-5.000.000") ? 'selected' : '' ?>>3.000.000 - 5.000.000</option>
        <option value=">5.000.000" <?= ($gaji == ">5.000.000") ? 'selected' : '' ?>> > 5.000.000</option>
    </select>
    <div class="error"><?= $error_gaji ?></div>

    <label>Lama Bekerja (dalam tahun):</label>
    <input type="text" name="lama_bekerja" value="<?= $lama_bekerja ?>">
    <div class="error"><?= $error_lama_bekerja ?></div>

    <button type="submit">Kirim</button>
</form>
</body>
</html>
