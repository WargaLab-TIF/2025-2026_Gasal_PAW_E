<?php
require_once 'function.php';

$NIK = $nama = $birthplace = $birthdate = $jenis_kelamin = $agama = $status_pernikahan =
$gol_darah = $status_pegawai = $gol_terakhir = $gaji = $karpeg = $npwp = $alamat = $telepon = $email = '';

$error_nik = $error_nama = $error_birthplace = $error_birthdate = $error_jenis_kelamin = $error_agama =
$error_status_pernikahan = $error_gol_darah = $error_status_pegawai = $error_gol_terakhir = $error_gaji =
$error_karpeg = $error_npwp = $error_alamat = $error_telepon = $error_email = '';

$is_valid = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NIK = test_input($_POST['NIK']);
    $nama = test_input($_POST['nama']);
    $birthplace = test_input($_POST['birthplace']);
    $birthdate = test_input($_POST['birthdate']);
    $jenis_kelamin = test_input($_POST['jenis_kelamin'] ?? '');
    $agama = test_input($_POST['agama']);
    $status_pernikahan = test_input($_POST['status_pernikahan']);
    $gol_darah = test_input($_POST['gol_darah']);
    $status_pegawai = test_input($_POST['status_pegawai']);
    $gol_terakhir = test_input($_POST['gol_terakhir']);
    $gaji = test_input($_POST['gaji']);
    $karpeg = test_input($_POST['karpeg']);
    $npwp = test_input($_POST['npwp']);
    $alamat = test_input($_POST['alamat']);
    $telepon = test_input($_POST['telepon']);
    $email = test_input($_POST['email']);

    if (!wajib_isi($NIK)) $error_nik = "Wajib diisi";
    elseif (!numerik($NIK)) $error_nik = "Harus angka";
    elseif (!panjang_digit($NIK, 16)) $error_nik = "Harus 16 digit";

    if (!wajib_isi($nama)) $error_nama = "Wajib diisi";
    elseif (!alfabet($nama)) $error_nama = "Hanya huruf dan spasi";

    if (!wajib_isi($birthplace)) $error_birthplace = "Wajib diisi";
    if (!wajib_isi($birthdate)) $error_birthdate = "Wajib diisi";
    if (!wajib_isi($jenis_kelamin)) $error_jenis_kelamin = "Wajib diisi";
    if (!wajib_isi($agama)) $error_agama = "Wajib diisi";
    if (!wajib_isi($status_pernikahan)) $error_status_pernikahan = "Wajib diisi";
    if (!wajib_isi($gol_darah)) $error_gol_darah = "Wajib diisi";
    if (!wajib_isi($status_pegawai)) $error_status_pegawai = "Wajib diisi";
    if (!wajib_isi($karpeg)) $error_karpeg = "Wajib diisi";
    if (!wajib_isi($gaji)) $error_gaji = "Wajib diisi";
    if (!wajib_isi($alamat)) $error_alamat = "Wajib diisi";
    if (!wajib_isi($telepon)) $error_telepon = "Wajib diisi";
    if (!wajib_isi($email)) $error_email = "Wajib diisi";

    $is_valid = empty($error_nik) && empty($error_nama) && empty($error_birthplace) &&
                empty($error_birthdate) && empty($error_jenis_kelamin) && empty($error_agama) &&
                empty($error_status_pernikahan) && empty($error_gol_darah) && empty($error_status_pegawai) &&
                empty($error_gol_terakhir) && empty($error_gaji) && empty($error_karpeg) &&
                empty($error_npwp) && empty($error_alamat) && empty($error_telepon) && empty($error_email);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulir Data Pegawai</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h1>FORMULIR DATA ISIAN PEGAWAI</h1>

  <div class="main">
    <?php if ($is_valid && $_SERVER['REQUEST_METHOD']==='POST'): ?>
      <div class="output">
        <p>Isian form sudah benar semua. Data berhasil dikirim.</p>
      </div>

      <div class="isi">
        <p>NIK: <?= $NIK ?></p>
        <p>Nama Lengkap: <?= $nama ?></p>
        <p>Tempat/Tanggal Lahir: <?= $birthplace ?> <?= $birthdate ?></p>
        <p>Jenis Kelamin: <?= $jenis_kelamin ?></p>
        <p>Agama: <?= $agama ?></p>
        <p>Status Perkawinan: <?= $status_pernikahan ?></p>
        <p>Golongan Darah: <?= $gol_darah ?></p>
        <p>Status Kepegawaian: <?= $status_pegawai ?></p>
        <p>Golongan Terakhir: <?= $gol_terakhir ?></p>
        <p>Gaji Pokok: <?= $gaji ?></p>
        <p>Nomor Kartu Pegawai: <?= $karpeg ?></p>
        <p>Nomor NPWP: <?= $npwp ?></p>
        <p>Alamat: <?= $alamat ?></p>
        <p>Nomor Telepon: <?= $telepon ?></p>
        <p>Email: <?= $email ?></p>
      </div>
    <?php else: ?>
      <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <label>NIK:</label>
        <input type="text" name="NIK" value="<?= $NIK ?>" placeholder="contoh: 3201234567890123">
        <div class="error"><?= $error_nik ?></div>

        <label>Nama Lengkap:</label>
        <input type="text" name="nama" value="<?= $nama ?>" placeholder="Nama lengkap sesuai KTP">
        <div class="error"><?= $error_nama ?></div>

        <label>Tempat/Tanggal Lahir:</label>
        <input type="text" name="birthplace" value="<?= $birthplace ?>" placeholder="Kota/Kabupaten lahir">
        <input type="date" name="birthdate" value="<?= $birthdate ?>">
        <div class="error"><?= $error_birthplace ?> <?= $error_birthdate ?></div>

        <label>Jenis Kelamin:</label>
        <div class="radio-group">
          <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin==='Laki-laki'?'checked':''; ?>> Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin==='Perempuan'?'checked':''; ?>> Perempuan
        </div>
        <div class="error"><?= $error_jenis_kelamin ?></div>

        <label>Agama:</label>
        <input type="text" name="agama" value="<?= $agama ?>" placeholder="contoh: Islam/Kristen/Hindu dsb.">
        <div class="error"><?= $error_agama ?></div>

        <label>Status Perkawinan:</label>
        <select name="status_pernikahan">
          <option value="">--Pilih Status Perkawinan--</option>
          <option value="Belum Kawin">Belum Kawin</option>
          <option value="Kawin">Kawin</option>
          <option value="Janda">Janda</option>
          <option value="Duda">Duda</option>
        </select>
        <div class="error"><?= $error_status_pernikahan ?></div>

        <label>Golongan Darah:</label>
        <input type="text" name="gol_darah" value="<?= $gol_darah ?>" placeholder="A / B / AB / O (opsional +/−)">
        <div class="error"><?= $error_gol_darah ?></div>

        <label>Status Kepegawaian:</label>
        <select name="status_pegawai">
          <option value="">--Pilih Status Kepegawaian--</option>
          <option value="CPNS">CPNS</option>
          <option value="PNS">PNS</option>
        </select>
        <div class="error"><?= $error_status_pegawai ?></div>

        <label>Golongan Terakhir:</label>
        <input type="text" name="gol_terakhir" value="<?= $gol_terakhir ?>" placeholder="contoh: III/a atau teks singkat">
        <div class="error"><?= $error_gol_terakhir ?></div>

        <label>Gaji Pokok:</label>
        <input type="text" name="gaji" value="<?= $gaji ?>" placeholder="angka saja, contoh: 5000000">
        <div class="error"><?= $error_gaji ?></div>

        <label>Nomor Kartu Pegawai:</label>
        <input type="text" name="karpeg" value="<?= $karpeg ?>" placeholder="angka saja">
        <div class="error"><?= $error_karpeg ?></div>

        <label>Nomor NPWP:</label>
        <input type="text" name="npwp" value="<?= $npwp ?>" placeholder="12.345.678.9-012.345">
        <div class="error"><?= $error_npwp ?></div>

        <label>Alamat:</label>
        <textarea name="alamat"><?= htmlspecialchars($alamat) ?></textarea>
        <div class="error"><?= $error_alamat ?></div>

        <label>Nomor Telepon:</label>
        <input type="text" name="telepon" value="<?= $telepon ?>" placeholder="081245632476">
        <div class="error"><?= $error_telepon ?></div>

        <label>Email:</label>
        <input type="text" name="email" value="<?= $email ?>" placeholder="contoh: nama@domain.com">
        <div class="error"><?= $error_email ?></div>

        <div class="form-footer">
          <button type="submit">Kirim</button>
        </div>
      </form>
    <?php endif; ?>
  </div>
</div>
</body>

</html>
