<?php

require_once 'function.php';

$nama = $nip = $email = $alamat = $telefon = $jabatan = $gaji = $departemen = "";
$saveNama = $saveNip = $saveEmail = $saveAlamat = $saveTelefon = $saveJabatan = $saveGaji = $saveDepartemen = "";

$showForm = true;

if (isset($_POST['submit'])) {

    // DATA PEGAWAI
    $saveNama = $_POST['nama'];
    $saveNip = $_POST['nip'];
    $saveEmail = $_POST['email'];
    $saveAlamat = $_POST['alamat'];
    $saveTelefon = $_POST['telefon'];
    $saveJabatan = $_POST['jabatan'];
    $saveGaji = $_POST['gaji'];
    $saveDepartemen = $_POST['departemen'];

    // VALIDASI DATA PEGAWAI
    if (empty($saveNama)) {
        $nama = "Wajib mengisi field!";
    } elseif (!validasiNama($saveNama)) {
        $nama = "Nama tidak valid! Hanya boleh berisi huruf";
    }

    if (empty($saveNip)) {
        $nip = "Wajib mengisi field!";
    } elseif (!validasiNip($saveNip)) {
        $nip = "NIP tidak valid! Harus 8 digit angka";
    }

    if (empty($saveAlamat)) {
        $alamat = "Wajib mengisi field!";
    } elseif (!validasiAlamat($saveAlamat)) {
        $alamat = "Alamat tidak valid! Hanya boleh berisi huruf, angka, dan karakter umum";
    }
    
    if (empty($saveTelefon)) {
        $telefon = "Wajib mengisi field!";
    } elseif (!validasiTelefon($saveTelefon)) {
        $telefon = "No. Telefon harus 10-13 digit angka!";
    }

    if (empty($saveEmail)) {
        $email = "Wajib mengisi field!";
    } elseif (!validasiEmail($saveEmail)){
        $email = "Email tidak valid!";
    }

    if (empty($saveJabatan)) {
        $jabatan = "Wajib mengisi field!";
    } elseif (!validasiJabatan($saveJabatan)) {
        $jabatan = "Jabatan tidak valid! Hanya boleh berisi huruf";
    }

    if (empty($saveGaji)) {
        $gaji = "Wajib mengisi field!";
    } elseif (!validasiGaji($saveGaji)) {
        $gaji = "Gaji harus berupa angka!";
    }

    if (empty($saveDepartemen)){
        $departemen = "Wajib mengisi field!";
    }

    // JIKA SEMUA VALIDASI LULUS
    if (
        empty($nama) && empty($nip) && empty($alamat) && empty($telefon) &&
        empty($email) && empty($jabatan) && empty($gaji) && empty($departemen)
    ) {
        $showForm = false;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendataan Kepegawaian</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php if ($showForm): ?>
        <form method="POST">
            <div class="form-header">
                <h1 class="form-header-title">Form Pendataan Kepegawaian</h1>
            </div>

            <fieldset>
                <legend>Data Pribadi</legend>

                <label>Nama Lengkap:</label>
                <input type="text" name="nama" value="<?= $saveNama ?>" placeholder="Input dengan format alphabet">
                <div class="error"><?= $nama ?></div>

                <label>NIP:</label>
                <input type="text" name="nip" value="<?= $saveNip ?>" placeholder="Input 8 digit angka">
                <div class="error"><?= $nip ?></div>

                <label>Alamat:</label>
                <input type="text" name="alamat" value="<?= $saveAlamat ?>" placeholder="Input alfanumerik">
                <div class="error"><?= $alamat ?></div>

                <label>No. Telefon:</label>
                <input type="text" name="telefon" value="<?= $saveTelefon ?>" placeholder="Input 10-13 digit angka">
                <div class="error"><?= $telefon ?></div>

                <label>Email:</label>
                <input type="text" name="email" value="<?= $saveEmail ?>" placeholder="Input format email yang valid">
                <div class="error"><?= $email ?></div>
            </fieldset>

            <fieldset>
                <legend>Data Jabatan</legend>

                <label>Jabatan:</label>
                <input type="text" name="jabatan" value="<?= $saveJabatan ?>" placeholder="Input dengan format alphabet">
                <div class="error"><?= $jabatan ?></div>

                <label>Gaji Pokok:</label>
                <input type="text" name="gaji" value="<?= $saveGaji ?>" placeholder="Input dengan format numeric">
                <div class="error"><?= $gaji ?></div>

                <label>Departemen:</label>
                <select name="departemen">
                    <option value="">Pilih departemen</option>
                    <option value="hrd" <?php if ($saveDepartemen == "hrd") echo 'selected'; ?>>HRD</option>
                    <option value="keuangan" <?php if ($saveDepartemen == "keuangan") echo 'selected'; ?>>Keuangan</option>
                    <option value="produksi" <?php if ($saveDepartemen == "produksi") echo 'selected'; ?>>Produksi</option>
                    <option value="pemasaran" <?php if ($saveDepartemen == "pemasaran") echo 'selected'; ?>>Pemasaran</option>
                    <option value="teknologi" <?php if ($saveDepartemen == "teknologi") echo 'selected'; ?>>Teknologi Informasi</option>
                </select>
                <div class="error"><?= $departemen ?></div>
            </fieldset>

            <button type="submit" name="submit">Simpan Data</button>
        </form>
    <?php else: ?>
        <div class="success-box">
            <h1 class="success-title">Data Tersimpan!</h1>
            <p class="success-message">Data kepegawaian telah berhasil disimpan.</p>
        </div>
    <?php endif; ?>
</body>
</html>