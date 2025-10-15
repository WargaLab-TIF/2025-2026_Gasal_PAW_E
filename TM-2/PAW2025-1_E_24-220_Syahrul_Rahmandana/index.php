<?php 

require_once 'function.php';

$nama = $kode = $telpon = $email = $alamat = '';
$error_nama = $error_kode = $error_telpon = $error_email = $error_alamat = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$nama = inputan($_POST['nama']);
	$kode = inputan($_POST['kode']);
	$telpon = inputan($_POST['telpon']);
	$email = inputan($_POST['email']);
	$alamat = inputan($_POST['alamat']);
}

if(!wajibIsi($nama)){
	$error_nama = 'Nama Kosong, Wajib Di Isi';
}elseif(!alfabet($nama)){
	$error_nama = 'Masukkan Hanya Alfabet';
}elseif(!minimal($nama)){
	$error_nama = 'Masukkan Nama minimal 3 kaarakter';
}

if(!wajibIsi($kode)){
	$error_kode = 'Id Kosong, Wajib Di Isi';
}elseif (!alfanumerik($kode)){
	$error_kode = 'Id Terdiri Dari Angka Dan Huruf';
}elseif(!minimal($kode)){
	$error_kode = 'Masukkan Id minimal 3 kaarakter';
}

if(!wajibIsi($telpon)){
	$error_telpon = 'Nomor Telpon Kosong, Wajib di isi';
}elseif(!numerik($telpon)){
	$error_telpon = 'No Telpon hanya menerima angka';
}elseif(!minimalTelpon($telpon)){
	$error_telpon = 'Masukkan Nomor telpon Minimal 10 angka';
}

if(!wajibIsi($email)){
	$error_email = 'Email Kosong, Wajib di isi';
}elseif(!email($email)){
	$error_email = 'Email tidak sesuai';
}elseif(!minimal($email)){
	$error_email = 'Masukkan Karakter minimal 3';
}

if(!wajibIsi($alamat)){
	$error_alamat = 'Alamat Kosong, Wajib Di Isi';
}elseif(!alfanumerik($alamat)){
	$error_alamat = 'alamat Terdiri Dari Angka Dan Huruf';
}elseif(!minimal($alamat)){
	$error_alamat = 'Masukkan Karakter minimal 3';
}


 ?>




<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>form kepegawaian</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>FORM KEPEGAWAIAN</h2>
	<div class="data">	
		<form action="index.php" method="POST">
			<label for="nama">Nama Lengkap</label>
			<input type="text" name="nama" id="nama" value="<?= $nama ?>">
			<div class="error"><?=$error_nama ?></div>

			<label for="kode">ID Pegawai</label>
			<input type="text" name="kode" id="kode" value="<?= $kode ?>">
			<div class="error"><?=$error_kode ?></div>

			<label for="telpon">No Telpon</label>
			<input type="text" name="telpon" id="telpon" value="<?=$telpon?>">
			<div class="error"><?=$error_telpon?></div>

			<label>Email</label>
			<input type="text" name="email" id="email" value="<?=$email?>">
			<div class="error"><?=$error_email?></div>

			<label for="alamat">Alamat</label>
			<input type="text" name="alamat" id="alamat" value="<?=$alamat?>">
			<div class="error"><?=$error_alamat?></div>

			<button type="submit" name="submit">Kirim</button>

		</form>
	</div>

	<div class="berhasil">
		<?php 
		if(
			empty($error_nama) && 
			empty($error_kode) && 
			empty($error_telpon) && 
			empty($error_email) && 
			empty($error_alamat)
		){
			echo "BERHASIL MASUK";
		}

	 	?>
	</div>

</body>
</html>