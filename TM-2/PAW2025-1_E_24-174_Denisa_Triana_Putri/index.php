<?php  
require_once 'function.php'; 

$nama = $nip = $email = $jabatan = $alamat = $kode = '';


$err_nama = $err_nip = $err_email = $err_jabatan = $err_alamat = $err_kode = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = test_input($_POST['nama']);
    $nip = test_input($_POST['nip']);
    $email = test_input($_POST['email']);
    $jabatan = test_input($_POST['jabatan']);
    $alamat = test_input($_POST['alamat']);
    $kode = test_input($_POST['kode']);


    if (!wajib($nama)) {
        $err_nama = "Nama wajib diisi.";
    } elseif (!alfabet($nama)) {
        $err_nama = "Nama hanya boleh berisi huruf dan spasi.";
    } elseif (strlen($nama) < 3 || strlen($nama) > 30) {
        $err_nama = "Nama minimal 3 karakter dan maksimal 30 karakter.";
    }


    if (!wajib($nip)) {
        $err_nip = "NIP wajib diisi.";
    } elseif (!numerik($nip)) {
        $err_nip = "NIP hanya boleh angka.";
    } elseif (strlen($nip) != 8) {
        $err_nip = "NIP harus terdiri dari 8 digit angka.";
    }


    if (!wajib($email)) {
        $err_email = "Email wajib diisi.";
    } elseif (!email($email)) {
        $err_email = "Format email tidak valid.";
    }


    if (!wajib($jabatan)) {
        $err_jabatan = "Jabatan wajib diisi.";
    } elseif (!alfabet($jabatan)) {
        $err_jabatan = "Jabatan hanya boleh berisi huruf.";
    } elseif (strlen($jabatan) < 3 || strlen($jabatan) > 25) {
        $err_jabatan = "Jabatan minimal 3 karakter dan maksimal 25 karakter.";
    }



    if (!wajib($alamat)) {
        $err_alamat = "Alamat wajib diisi.";
    } elseif (!alfanumerik($alamat)) {
        $err_alamat = "Alamat hanya boleh berisi huruf dan angka.";
    } elseif (strlen($alamat) < 5 || strlen($alamat) > 20) {
        $err_alamat = "Alamat minimal 5 karakter dan maksimal 20 karakter.";
    }



    if (!wajib($kode)) {
        $err_kode = "Kode pegawai wajib diisi.";
    } elseif (!kode($kode)) {
        $err_kode = "Kode pegawai hanya boleh huruf dan angka tanpa spasi.";
    } elseif (strlen($kode) != 5) {
        $err_kode = "Kode harus terdiri dari 5 karakter huruf atau angka.";
    }


    if (
        empty($err_nama) && empty($err_nip) && empty($err_email) &&
        empty($err_jabatan) && empty($err_alamat) && empty($err_kode)
    ) {
        echo "<div class='sukses'>✅ Data pegawai berhasil disimpan!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Kepegawaian</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Form Pendataan Kepegawaian</h2>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $nama ?>">
        <div class="error"><?= $err_nama ?></div>

        <label>NIP (Nomor Induk Pegawai)</label>
        <input type="text" name="nip" value="<?= $nip ?>">
        <div class="error"><?= $err_nip ?></div>

        <label>Email</label>
        <input type="text" name="email" value="<?= $email ?>">
        <div class="error"><?= $err_email ?></div>

        <label>Jabatan</label>
        <input type="text" name="jabatan" value="<?= $jabatan ?>">
        <div class="error"><?= $err_jabatan ?></div>

        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= $alamat ?>">
        <div class="error"><?= $err_alamat ?></div>

        <label>Kode Pegawai</label>
        <input type="text" name="kode" value="<?= $kode ?>">
        <div class="error"><?= $err_kode ?></div>

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
