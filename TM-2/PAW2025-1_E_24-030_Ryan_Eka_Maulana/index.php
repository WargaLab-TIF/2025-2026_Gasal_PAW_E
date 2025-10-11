<?php
require_once 'function.php';

$errors = [
    'nip' => '', 'nama' => '', 'jabatan' => '',
    'email' => '', 'telepon' => '', 'alamat' => ''
];

$values = [
    'nip' => '', 'nama' => '', 'jabatan' => '',
    'email' => '', 'telepon' => '', 'alamat' => ''
];

$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $k => $v) {
        $values[$k] = isset($_POST[$k]) ? test_input($_POST[$k]) : '';
    }

    foreach ($values as $k => $v) {
        if (is_empty($v)) {
            $errors[$k] = 'Field ini wajib diisi.';
        }
    }

    if ($errors['nip'] === '') {
        if (!is_numeric_str($values['nip'])) {
            $errors['nip'] = 'NIP harus berupa angka (digit).';
        } elseif (!length_is($values['nip'], 8)) {
            $errors['nip'] = 'NIP harus terdiri dari 8 digit.';
        }
    }

    if ($errors['nama'] === '') {
        if (!is_alpha($values['nama'])) {
            $errors['nama'] = 'Nama hanya boleh berisi huruf dan spasi.';
        } elseif (!length_between($values['nama'], 3, 50)) {
            $errors['nama'] = 'Nama harus 3 sampai 50 karakter.';
        }
    }

    if ($errors['jabatan'] === '') {
        if (!is_alpha($values['jabatan'])) {
            $errors['jabatan'] = 'Jabatan hanya boleh berisi huruf dan spasi.';
        } elseif (!length_between($values['jabatan'], 2, 50)) {
            $errors['jabatan'] = 'Jabatan harus 2 sampai 50 karakter.';
        }
    }

    if ($errors['email'] === '') {
        if (!valid_email($values['email'])) {
            $errors['email'] = 'Format email tidak valid.';
        }
    }

    if ($errors['telepon'] === '') {
        if (!is_numeric_str($values['telepon'])) {
            $errors['telepon'] = 'Nomor telepon harus berisi angka saja.';
        } elseif (!length_between($values['telepon'], 10, 13)) {
            $errors['telepon'] = 'Nomor telepon harus 10 sampai 13 digit.';
        }
    }

    if ($errors['alamat'] === '') {
        if (!is_alnum_space($values['alamat'])) {
            $errors['alamat'] = 'Alamat mengandung karakter tidak diperbolehkan.';
        } elseif (!length_between($values['alamat'], 5, 200)) {
            $errors['alamat'] = 'Alamat harus 5 sampai 200 karakter.';
        }
    }

    $hasError = false;
    foreach ($errors as $e) {
        if ($e !== '') { $hasError = true; break; }
    }

    if (!$hasError) {
        $success = "Data berhasil divalidasi. Terima kasih — semua field valid.";
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TM2 - PAW (Kelas E) Tema D - Pendataan Kepegawaian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>Pendataan Kepegawaian (Tema D) - TM2</h1>

        <?php if ($success): ?>
            <div class="success"><?= $success ?></div>
        <?php endif; ?>

        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="field">
                <label for="nip">NIP (8 digit)</label>
                <input type="text" id="nip" name="nip" maxlength="20" value="<?= htmlspecialchars($values['nip']) ?>">
                <div class="error"><?= $errors['nip'] ?></div>
            </div>

            <div class="field">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($values['nama']) ?>">
                <div class="error"><?= $errors['nama'] ?></div>
            </div>

            <div class="field">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="<?= htmlspecialchars($values['jabatan']) ?>">
                <div class="error"><?= $errors['jabatan'] ?></div>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($values['email']) ?>">
                <div class="error"><?= $errors['email'] ?></div>
            </div>

            <div class="field">
                <label for="telepon">No. Telepon (10-13 digit)</label>
                <input type="text" id="telepon" name="telepon" maxlength="20" value="<?= htmlspecialchars($values['telepon']) ?>">
                <div class="error"><?= $errors['telepon'] ?></div>
            </div>

            <div class="field">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3"><?= htmlspecialchars($values['alamat']) ?></textarea>
                <div class="error"><?= $errors['alamat'] ?></div>
            </div>

            <div class="actions">
                <button type="submit" name="submit">Kirim</button>
            </div>
        </form>

    </main>
</body>
</html>
