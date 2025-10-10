<?php 
require 'function.php';

$nama = $noHp = $kode = $harga = $noSertifikat = $alamat = '';
$namaErr = $noHpErr = $kodeErr = $hargaErr = $noSertifikatErr = $alamatErr = '';
$successMsg = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['nama'])) {
        $namaErr = "Field masukan wajib diisi";
    } else {
        $nama = test_input($_POST['nama']);
        if (!is_alfabate($nama)) {
            $namaErr = "Field hanya boleh berisi huruf (alfabet)";
        } elseif (!is_valid_length_string($nama, 3, 50)) {
            $namaErr = "Nama harus 3–50 karakter";
        }
    }

    if (empty($_POST['no_hp'])) {
        $noHpErr = "Field masukan wajib diisi";
    } else {
        $noHp = test_input($_POST['no_hp']);
        if (!is_number($noHp)) {
            $noHpErr = "Field hanya boleh berisi angka";
        } elseif (!is_valid_length_numeric($noHp, 10, 13)) {
            $noHpErr = "Nomor HP harus 10–13 digit";
        } elseif (substr($noHp, 0, 2) !== "08") {
            $noHpErr = "Nomor HP harus diawali dengan 08";
        }
    }

    if (empty($_POST['kode_aset'])) {
        $kodeErr = "Field masukan wajib diisi";
    } else {
        $kode = test_input($_POST['kode_aset']);
        if (!is_alphanumeric($kode)) {
            $kodeErr = "Kode aset hanya boleh berisi huruf dan angka (tanpa simbol)";
        } elseif (!is_valid_length_string($kode, 5, 10)) {
            $kodeErr = "Kode aset harus 5–10 karakter";
        }
    }

    if (empty($_POST['harga'])) {
        $hargaErr = "Field masukan wajib diisi";
    } else {
        $harga = test_input($_POST['harga']);
        if (!is_number($harga)) {
            $hargaErr = "Harga hanya boleh berisi angka";
        }
    }

    if (empty($_POST['no_sertifikat'])) {
        $noSertifikatErr = "Field masukan wajib diisi";
    } else {
        $noSertifikat = test_input($_POST['no_sertifikat']);
        if (!is_number($noSertifikat)) {
            $noSertifikatErr = "Nomor sertifikat hanya boleh angka";
        } elseif (!is_valid_length_numeric($noSertifikat, 8, 20)) {
            $noSertifikatErr = "Nomor sertifikat harus 8–20 digit";
        }
    }

    if (empty($_POST['alamat'])) {
        $alamatErr = "Field masukan wajib diisi";
    } else {
        $alamat = test_input($_POST['alamat']);
        if (!alamat($alamat)) {
            $alamatErr = "Alamat hanya boleh berisi huruf dan angka";
        } elseif (!is_valid_length_string($alamat, 5, 100)) {
            $alamatErr = "Alamat harus 5–100 karakter";
        }
    }

    if (
        empty($namaErr) && empty($noHpErr) && empty($kodeErr) &&
        empty($hargaErr) && empty($noSertifikatErr) && empty($alamatErr)
    ) {
        $successMsg = "✅ Semua data valid! Form berhasil dikirim.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendataan Aset Properti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form Pendataan Aset Properti</h1>
    
    <?php if ($successMsg): ?>
        <p class="success"><?= $successMsg; ?></p>
        <?php die(); ?>
    <?php endif;  ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="nama">Nama Lengkap :</label>
        <input type="text" id="nama" name="nama" value="<?= $nama; ?>">
        <div class="err"><?= $namaErr; ?></div>

        <label for="no_hp">Nomor HP :</label>
        <input type="text" id="no_hp" name="no_hp" value="<?= $noHp; ?>">
        <div class="err"><?= $noHpErr; ?></div>

        <label for="kode_aset">Kode Aset :</label>
        <input type="text" id="kode_aset" name="kode_aset" value="<?= $kode; ?>">
        <div class="err"><?= $kodeErr; ?></div>

        <label for="harga">Harga Properti :</label>
        <input type="text" id="harga" name="harga" value="<?= $harga; ?>">
        <div class="err"><?= $hargaErr; ?></div>

        <label for="no_sertifikat">Nomor Sertifikat :</label>
        <input type="text" id="no_sertifikat" name="no_sertifikat" value="<?= $noSertifikat; ?>">
        <div class="err"><?= $noSertifikatErr; ?></div>

        <label for="alamat">Alamat Properti :</label>
        <input type="text" id="alamat" name="alamat" value="<?= $alamat; ?>">
        <div class="err"><?= $alamatErr; ?></div>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
