<?php
require_once "functions.php";

$namaPemilik=$kodeAset=$nomorSertifikat=$luasTanah=$kodeLogin="";
$error_namaPemilik=$error_kodeAset=$error_nomerSertifikat=$error_luasTanah=$error_kodeLogin="";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $namaPemilik = test_input($_POST['namaPemilik']);
    $kodeAset = test_input($_POST['kodeAset']);
    $nomorSertifikat = test_input($_POST['nomorSertifikat']);
    $luasTanah = test_input($_POST['luasTanah']);
    $kodeLogin = test_input($_POST['kodeLogin']);

    if (!wajib_isi($namaPemilik)){
        $error_namaPemilik = "Masukkan nama Nama Pemilik";
    }elseif (!alphabet($namaPemilik)){
        $error_namaPemilik = "Masukkan Nama Pemilik";
    }

    if (!wajib_isi($kodeAset)) {
        $error_kodeAset = "masukkan Kode aset dengan benar";
    }elseif (!alfanumerik($kodeAset)){
        $error_kodeAset = "masukkan Kode aset dengan benar";
    }

    if (!wajib_isi($nomorSertifikat)){
        $error_nomerSertifikat = "Masukkan Nomer Sertifikat Dengan Benar";
    }elseif (!numerik($nomorSertifikat)){
        $error_nomerSertifikat = "Masukkan Nomer Sertifikat Dengan Benar";
    }

    if (!wajib_isi($luasTanah)) {
        $error_luasTanah = "Masukkan Luas Tanah";
    }elseif (!luas($luasTanah)) {
        $error_luasTanah = "Masukkan Luas Tanah";
    }

    if (!wajib_isi($kodeLogin)) {
        $error_kodeLogin = "Masukkan Kode";
    }elseif (!desimal($kodeLogin)) {
        $error_kodeLogin = "Masukkan Kode";
    }


    if (empty($error_namaPemilik) && empty($error_kodeAset) && empty($nomorSertifikat) && empty($luasTanah) && empty($kodeLogin)) {
        echo "Berhasil Memasukkan Data";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>pendataan aset tanah</h1>

    <form action="" method="post">
        <label >Nama Pemilik</label>
        <input type="text" name="namaPemilik" value="<?= $namaPemilik; ?>" placeholder="Masukkan Nama Pemilik">
        <div class="error"><?=$error_namaPemilik; ?></div>

        <label>Kode Aset</label>
        <input type="text" name="kodeAset" value="<?=$kodeAset;?>" placeholder="Masukkan kode Aset min (6 digit)">
        <div class="error"><?=$error_kodeAset?></div>

        <label>Nomor Sertifikat</label>
        <input type="text" name="nomorSertifikat"value="<?=$nomorSertifikat;?>" placeholder="Masukkan Nomor Sertifikat">
        <div class="error"><?=$error_nomerSertifikat?></div>

        <label>Luas Tanah (M²)</label>
        <input type="text" name="luasTanah" value="<?=$luasTanah;?>" placeholder="Masukkan Luas Tanah">
        <div class="error"><?=$error_luasTanah?></div>

        <label>Kode Login</label>
        <input type="text" name="kodeLogin" value="<?=$kodeLogin;?>" placeholder="Masukkan Kode Login ">
        <div class="error"><?=$error_kodeLogin?></div>

        <input type="submit">
        <input type="reset">
        
    </form>
</body>
</html>