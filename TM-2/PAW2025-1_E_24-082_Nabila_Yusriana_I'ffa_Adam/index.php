<?php
// TM2 Kelas E — Tema D (Kepegawaian)
require __DIR__ . '/includes/functions.php';
$errors = [];
$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($submitted) {
    // Hanya 4 field sesuai permintaan
    $fields = ['nama_pegawai','unit','nip','kode_pegawai'];
    foreach ($fields as $f) {
        if (!is_required($_POST[$f] ?? '')) add_error($errors, $f, 'Field wajib diisi.');
    }
    // Alphabetic
    if (is_required($_POST['nama_pegawai'] ?? '') && !is_alpha($_POST['nama_pegawai'])) add_error($errors, 'nama_pegawai', 'Hanya huruf dan spasi.');
    if (is_required($_POST['unit'] ?? '') && !is_alpha($_POST['unit'])) add_error($errors, 'unit', 'Hanya huruf dan spasi.');
    // Numeric
    if (is_required($_POST['nip'] ?? '') && !is_numeric_str($_POST['nip'])) add_error($errors, 'nip', 'Hanya digit 0-9.');
    // Alphanumeric
    if (is_required($_POST['kode_pegawai'] ?? '') && !is_alnum($_POST['kode_pegawai'])) add_error($errors, 'kode_pegawai', 'Hanya huruf dan angka.');
    // Length checks
    if (is_required($_POST['nip'] ?? '') && !has_digit_length($_POST['nip'], 18)) add_error($errors, 'nip', 'Harus tepat 18 digit.');
    if (is_required($_POST['nama_pegawai'] ?? '') && !has_char_length($_POST['nama_pegawai'], 3, 50)) add_error($errors, 'nama_pegawai', 'Panjang 3 s.d. 50 karakter.');
    if (is_required($_POST['kode_pegawai'] ?? '') && !has_char_length($_POST['kode_pegawai'], 6, 10)) add_error($errors, 'kode_pegawai', 'Panjang 6 s.d. 10 karakter.');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TM2: Form Kepegawaian</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div class="container">
    <h1>TM2 Kelas E: Pendataan Kepegawaian</h1>
    <?php if ($submitted && empty($errors)): ?>
        <div class="success">Semua isian valid. Data berhasil diterima.</div>
        <table>
            <tr><th>Nama Pegawai</th><td><?= sticky('nama_pegawai') ?></td></tr>
            <tr><th>Unit</th><td><?= sticky('unit') ?></td></tr>
            <tr><th>NIP</th><td><?= sticky('nip') ?></td></tr>
            <tr><th>Kode Pegawai</th><td><?= sticky('kode_pegawai') ?></td></tr>
        </table>
        <p class="actions">
            <a class="outline" href="./">Kirim data lagi</a>
        </p>
    <?php else: ?>
        <form method="post" action="">
            <div class="row">
                <label for="nama_pegawai">Nama Pegawai</label>
                <div>
                    <input type="text" id="nama_pegawai" name="nama_pegawai" placeholder="Contoh: Nabila Yusriana" value="<?= sticky('nama_pegawai') ?>">
                    <small class="hint">Hanya huruf dan spasi, 3–50 karakter.</small>
                    <?php if (!empty($errors['nama_pegawai'])) foreach ($errors['nama_pegawai'] as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <label for="unit">Unit</label>
                <div>
                    <input type="text" id="unit" name="unit" placeholder="Contoh: Keuangan" value="<?= sticky('unit') ?>">
                    <small class="hint">Hanya huruf dan spasi.</small>
                    <?php if (!empty($errors['unit'])) foreach ($errors['unit'] as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <label for="nip">NIP</label>
                <div>
                    <input type="text" id="nip" name="nip" placeholder="Contoh: 198712312019031001" value="<?= sticky('nip') ?>">
                    <small class="hint">Angka saja, tepat 18 digit.</small>
                    <?php if (!empty($errors['nip'])) foreach ($errors['nip'] as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <label for="kode_pegawai">Kode Pegawai</label>
                <div>
                    <input type="text" id="kode_pegawai" name="kode_pegawai" placeholder="Contoh: EMP2025" value="<?= sticky('kode_pegawai') ?>">
                    <small class="hint">Huruf dan angka, 6–10 karakter.</small>
                    <?php if (!empty($errors['kode_pegawai'])) foreach ($errors['kode_pegawai'] as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
                </div>
            </div>
            <div class="actions">
                <button class="primary" type="submit">Kirim</button>
                <a class="outline" href="./">Reset</a>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
