<?php 
require_once 'function.php';

$nik = $nama = $alamat = $luas = $nilai = $status = $no_sertifikat = '';
$error_nik = $error_nama = $error_alamat = $error_luas = $error_nilai = $error_status = $error_no_sertifikat = '';
$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = test_input($_POST['nik']);
    $nama = test_input($_POST['nama']);
    $alamat = test_input($_POST['alamat']);
    $luas = test_input($_POST['luas']);
    $nilai = test_input($_POST['nilai']);
    $status = test_input($_POST['status']);
    $no_sertifikat = test_input($_POST['no_sertifikat']);

    if (!wajib_diisi($nik)){ 
        $error_nik = "Masukkan wajib diisi.";
    }elseif (!numerik($nik)){
         $error_nik = "NIK hanya boleh angka.";
    }elseif (!panjang_tepat($nik, 16)){
         $error_nik = "NIK harus terdiri dari 16 digit.";
    }

    if (!wajib_diisi($nama)){
         $error_nama = "Masukkan wajib diisi.";
    }elseif (!alfabet($nama)){
         $error_nama = "Nama hanya boleh huruf dan spasi.";
    }elseif (!panjang_karakter($nama, 3, 50)){
         $error_nama = "Nama minimal 3 karakter.";
    }

    if (!wajib_diisi($alamat)){
         $error_alamat = "Masukkan wajib diisi.";
    }elseif (!panjang_karakter($alamat, 5, 100)){
         $error_alamat = "Alamat minimal 5 karakter.";
    }elseif (!alamat($alamat)){
         $error_alamat = "hanya berisi alfanumerik";
    }

    if (!wajib_diisi($luas)){
         $error_luas = "Masukkan wajib diisi.";
    }elseif (!numerik($luas)){~
         $error_luas = "Luas tanah harus berupa angka.";
    }

    if (!wajib_diisi($nilai)){
         $error_nilai = "Masukkan wajib diisi.";
    }elseif (!numerik($nilai)){
         $error_nilai = "Nilai aset harus berupa angka.";
    }elseif (!minimalaset($nilai,1000000)) {
            $error_nilai = "Nilai aset minimal Rp 1.000.000.";
    }

    if (!wajib_diisi($status)){
         $error_status = "Silakan pilih status aset.";
    }

    if (!wajib_diisi($no_sertifikat)){
         $error_no_sertifikat = "Masukkan wajib diisi.";
    }elseif (!numerik($no_sertifikat)){
         $error_no_sertifikat = "Nomor sertifikat hanya boleh angka.";
    }elseif (!panjang_tepat($no_sertifikat, 10)){
         $error_no_sertifikat = "Nomor sertifikat harus 10 digit.";
    }

    if (
        empty($error_nik) && empty($error_nama) && empty($error_alamat) &&
        empty($error_luas) && empty($error_nilai) && empty($error_status) &&
        empty($error_no_sertifikat)
    ){ 
        $berhasil = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendataan Pemilik Aset</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <?php if ($berhasil): ?>
        <div class="success-card">
            <p> Form berhasil dikirim dan akan segera kami proses.</p>
        </div>
    <?php else: ?>
        <div class="form-card">
            <h2>Form Pendataan Pemilik Aset</h2>
            <form method="POST">
                <fieldset>
                    <legend>Data Pemilik</legend>
                    <label>NIK Pemilik:</label>
                    <input type="text" name="nik" value="<?= $nik; ?>">
                    <div class="error"><?= $error_nik; ?></div>

                    <label>Nama Pemilik:</label>
                    <input type="text" name="nama" value="<?= $nama; ?>">
                    <div class="error"><?= $error_nama; ?></div>

                    <label>Alamat:</label>
                    <textarea name="alamat"><?= $alamat; ?></textarea>
                    <div class="error"><?= $error_alamat; ?></div>
                </fieldset>

                <fieldset>
                    <legend>Detail Aset</legend>
                    <label>Luas Tanah (m²):</label>
                    <input type="text" name="luas" value="<?= $luas; ?>">
                    <div class="error"><?= $error_luas; ?></div>

                    <label>Nilai Aset (Rp):</label>
                    <input type="text" name="nilai" value="<?= $nilai; ?>">
                    <div class="error"><?= $error_nilai; ?></div>

                    <label>Status Aset:</label>
                    <select name="status">
                        <option value="">-- Pilih Status --</option>
                        <option value="Milik Sendiri" <?= $status=="Milik Sendiri"?"selected":""; ?>>Milik Sendiri</option>
                        <option value="Disewa" <?= $status=="Disewa"?"selected":""; ?>>Disewa</option>
                        <option value="Dijual" <?= $status=="Dijual"?"selected":""; ?>>Dijual</option>
                    </select>
                    <div class="error"><?= $error_status; ?></div>

                    <label>Nomor Sertifikat:</label>
                    <input type="text" name="no_sertifikat" value="<?= $no_sertifikat; ?>">
                    <div class="error"><?= $error_no_sertifikat; ?></div>
                </fieldset>

                <button type="submit">Kirim</button>
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
