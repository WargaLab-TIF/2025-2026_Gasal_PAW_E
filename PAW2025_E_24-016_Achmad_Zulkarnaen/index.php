<?php
require_once 'functions.php'; 

$is_submitted = false;
$is_valid = false;
$errors = [];
$values = [
    'nip' => '',
    'nama_pegawai' => '',
    'gaji_pokok' => '',
    'no_telepon' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_submitted = true;

    $values['nip'] = clean_input($_POST['nip'] ?? '');
    $values['nama_pegawai'] = clean_input($_POST['nama_pegawai'] ?? '');
    $values['gaji_pokok'] = clean_input($_POST['gaji_pokok'] ?? '');
    $values['no_telepon'] = clean_input($_POST['no_telepon'] ?? '');
    
    // FIELD 1: NIP (Ditetapkan 18 Karakter)
    $nip = $values['nip'];
    if (is_required($nip)) { 
        $errors['nip'] = "NIP wajib diisi.";
    } elseif (!is_alphanumeric_only($nip)) { 
        $errors['nip'] = "NIP harus berupa kombinasi huruf dan angka (Alfanumerik) saja.";
    } elseif (!check_char_range($nip, 18, 18)) {
        $errors['nip'] = "NIP harus memiliki panjang tepat 18 karakter (Sesuai standar ASN)."; 
    }

    // FIELD 2: Nama Pegawai (Ditetapkan 5-50 Karakter)
    $nama = $values['nama_pegawai'];
    if (is_required($nama)) { 
        $errors['nama_pegawai'] = "Nama Pegawai wajib diisi.";
    } elseif (!is_alpha($nama)) { 
        $errors['nama_pegawai'] = "Nama Pegawai hanya boleh mengandung huruf dan spasi.";
    } elseif (!check_char_range($nama, 5, 50)) { // VALIDASI 6: Diubah ke 5-50
        $errors['nama_pegawai'] = "Nama Pegawai harus memiliki panjang antara 5 sampai 50 karakter.";
    }

    // FIELD 3: Gaji Pokok (Ditetapkan 7 Digit)
    $gaji = $values['gaji_pokok'];
    if (is_required($gaji)) { 
        $errors['gaji_pokok'] = "Gaji Pokok wajib diisi.";
    } elseif (!is_numeric_only($gaji)) { 
        $errors['gaji_pokok'] = "Gaji Pokok harus berupa angka (numerik) saja. (Tidak boleh type number HTML)";
    } elseif (!check_numeric_length($gaji, 7, 7)) {
        $errors['gaji_pokok'] = "Gaji Pokok harus memiliki panjang tepat 7 digit angka.";
    }
    
    // FIELD 4: No. Telepon 
    $telp = $values['no_telepon'];
    if (is_required($telp)) { 
        $errors['no_telepon'] = "Nomor Telepon wajib diisi.";
    } elseif (!is_numeric_only($telp)) { 
        $errors['no_telepon'] = "Nomor Telepon harus berupa angka (numerik) saja. (Tidak boleh type number HTML)";
    } elseif (!check_numeric_length($telp, 10, 13)) { 
        $errors['no_telepon'] = "Nomor Telepon harus memiliki panjang antara 10 sampai 13 digit angka.";
    }

    if (empty($errors)) {
        $is_valid = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAW TM2 - Pendataan Pegawai</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <h1>Form Pendataan Pegawai</h1>
    <hr>

    <?php if ($is_valid): ?>
        <div class="success-message">
            <p>SELAMAT! Data Pegawai telah berhasil diproses.</p>
            <h2>Data Pegawai :</h2>
            <ul>
                <li>NIP : <?php echo htmlspecialchars($values['nip']) ?></li>
                <li>Nama Pegawai : <?php echo htmlspecialchars($values['nama_pegawai']) ?></li>
                <li>Gaji Pokok : Rp. <?php echo number_format((int)$values['gaji_pokok'], 0, ',', '.') ?></li>
                <li>No. Telepon : <?php echo htmlspecialchars($values['no_telepon']) ?></li>
            </ul>
        </div>
    
    <?php else: ?>

        <?php if ($is_submitted && !empty($errors)): ?>
            <div class="error-message">
                <p>Perhatian! Terdapat kesalahan pada isian form. Mohon perbaiki data di bawah ini.</p>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST" class="pegawai-form">
            
            <div class="form-group">
                <label for="nip">NIP (Alfanumerik/Numerik, Tepat 18 Karakter):</label> 
                <input type="text" id="nip" name="nip" 
                    value="<?php echo htmlspecialchars($values['nip']) ?>">
                <?php if (isset($errors['nip'])): ?>
                    <span class="error-text"><?php echo $errors['nip'] ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai (Alfabet, 5-50 Karakter):</label>
                <input type="text" id="nama_pegawai" name="nama_pegawai" 
                    value="<?php echo htmlspecialchars($values['nama_pegawai']) ?>">
                <?php if (isset($errors['nama_pegawai'])): ?>
                    <span class="error-text"><?php echo $errors['nama_pegawai'] ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok (Numerik, Tepat 7 Digit):</label>
                <input type="text" id="gaji_pokok" name="gaji_pokok" 
                    value="<?php echo htmlspecialchars($values['gaji_pokok']) ?>">
                <?php if (isset($errors['gaji_pokok'])): ?>
                    <span class="error-text"><?php echo $errors['gaji_pokok'] ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="no_telepon">Nomor Telepon (Numerik, 10-13 Digit):</label>
                <input type="text" id="no_telepon" name="no_telepon" 
                    value="<?php echo htmlspecialchars($values['no_telepon']) ?>">
                <?php if (isset($errors['no_telepon'])): ?>
                    <span class="error-text"><?php echo $errors['no_telepon'] ?></span>
                <?php endif; ?>
            </div>
            
            <button type="submit">Submit Data Pegawai</button>

        </form>
    <?php endif; ?>

</body>
</html>