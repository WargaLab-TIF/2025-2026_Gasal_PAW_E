<?php
include "functions.php";
$input = [
    'nama' => '',
    'nip' => '',
    'kode' => '',
    'alamat' => '',
    'email' => '',
    'telepon' => ''
];

$errors = [];
$sukses = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($input as $key => $value) {
        $input[$key] = $_POST[$key] ?? '';
    }

    // Validasi Nama
    if (!terisi($input['nama'])) {
        $errors['nama'] = "Nama wajib diisi.";
    } elseif (!huruf_spasi($input['nama'])) {
        $errors['nama'] = "Nama hanya boleh huruf dan spasi.";
    } elseif (!panjang_ok($input['nama'], 2, 50)) {
        $errors['nama'] = "Nama harus 2 - 50 karakter.";
    }

    // Validasi NIP
    if (!terisi($input['nip'])) {
        $errors['nip'] = "NIP wajib diisi.";
    } elseif (!angka_saja($input['nip'])) {
        $errors['nip'] = "NIP harus angka.";
    } elseif (!panjang_ok($input['nip'], 8, 12)) {
        $errors['nip'] = "NIP harus 8 - 12 digit.";
    }

    // Validasi Kode Pegawai
    if (!terisi($input['kode'])) {
        $errors['kode'] = "Kode Pegawai wajib diisi.";
    } elseif (!alfanum($input['kode'])) {
        $errors['kode'] = "Kode hanya boleh huruf dan angka.";
    } elseif (!panjang_ok($input['kode'], 4, 12)) {
        $errors['kode'] = "Kode harus 4 - 12 karakter.";
    }

    // Validasi Alamat
    if (!terisi($input['alamat'])) {
        $errors['alamat'] = "Alamat wajib diisi.";
    } elseif (!panjang_ok($input['alamat'], 5, 200)) {
        $errors['alamat'] = "Alamat minimal 5 karakter.";
    }

    // Validasi Email
    if (!terisi($input['email'])) {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($input['email'])) {
        $errors['email'] = "Format email tidak valid.";
    }

    // Validasi Telepon
    if (!terisi($input['telepon'])) {
        $errors['telepon'] = "Nomor telepon wajib diisi.";
    } elseif (!angka_saja($input['telepon'])) {
        $errors['telepon'] = "Telepon hanya boleh angka.";
    } elseif (!panjang_ok($input['telepon'], 10, 13)) {
        $errors['telepon'] = "Telepon harus 10 - 13 digit.";
    }

    // Jika valid
    if (empty($errors)) {
        $sukses = true;
        foreach ($input as $key => $value) {
            $input[$key] = bersih($value);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Kepegawaian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wadah">
    <h1>Form Data Kepegawaian</h1>
    <?php if ($sukses): ?>
        <div class="sukses">✅ Data berhasil divalidasi.</div>
        <ul class="ringkasan">
            <li><strong>Nama:</strong> <?= $input['nama'] ?></li>
            <li><strong>NIP:</strong> <?= $input['nip'] ?></li>
            <li><strong>Kode Pegawai:</strong> <?= $input['kode'] ?></li>
            <li><strong>Alamat:</strong> <?= $input['alamat'] ?></li>
            <li><strong>Email:</strong> <?= $input['email'] ?></li>
            <li><strong>Telepon:</strong> <?= $input['telepon'] ?></li>
        </ul>
    <?php else: ?>
        <?php if (!empty($errors)): ?>
            <div class="galat">
                <ul>
                    <?php foreach ($errors as $pesan) : ?>
                        <li><?= $pesan ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $input['nama'] ?>">

            <label>NIP</label>
            <input type="text" name="nip" value="<?= $input['nip'] ?>">

            <label>Kode Pegawai</label>
            <input type="text" name="kode" value="<?= $input['kode'] ?>">

            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $input['alamat'] ?>">

            <label>Email</label>
            <input type="text" name="email" value="<?= $input['email'] ?>">

            <label>Telepon</label>
            <input type="text" name="telepon" value="<?= $input['telepon'] ?>">

            <div class="baris">
                <button type="submit">Kirim</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
