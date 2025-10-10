<?php require "fungsi.php";
	$nama = $telepon = $kode = $email = $alamat = $luas_tanah = $type = $harga = $status = $succes = '';
	$error_nama = $error_telepon = $error_kode = $error_email = $error_alamat = $error_luas_tanah = $error_type = $error_harga = $error_status = '';

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$nama = $_POST['nama'];
		$telepon = $_POST['telepon'];
		$kode = $_POST['kode'];
		$alamat = $_POST['alamat'];
		$luas_tanah = $_POST['luas_tanah'];
		$type = $_POST['type'];
		$harga = $_POST['harga'];
		$status = $_POST['status'];

		if(required($nama)) {
			$error_nama = "*Masukkan Nama Lengkap";
		}elseif(!alfabet_batas($nama)) {
			$error_nama = "*Masukan harus 8 digit";
		}elseif (!alfabet($nama)) {
			$error_nama = "*Masukan harus alfabet";
		}

		if(required($telepon)) {
			$error_telepon = "*Masukkan nomer telepon";
		}elseif (!numerik_telepon($telepon)) {
			$error_telepon = "*Masukkan sesuai format telepon (12 / 13 digit)";
		}

		if(required($kode)) {
			$error_kode = "*Masukkan kode booking";
		}elseif (!alfanumerik($kode)) {
			$error_kode = "*Masukkan minimal 8 digit";
		}

		if(required($alamat)) {
			$error_alamat = "*Masukkan alamat";
		}elseif (!is_alamat($alamat)) {
			$error_alamat = "*Masukan tidak boleh ngasal";
		}

		if(required($luas_tanah)) {
			$error_luas_tanah = "*Masukkan luas_tanah";
		}elseif (!numerik($luas_tanah)) {
			$error_luas_tanah = "*Masukkan luas yang valid";
		}

		if(required($type)) {
			$error_type = "*Masukkan type";
		}

		if(required($harga)) {
			$error_harga = "*Masukkan harga";
		}elseif (!numerik($harga)) {
			$error_harga = "*Masukan harus numerik";
		}elseif (!numerik_harga($harga)) {
			$error_harga = "*Masukkan harga yang ngotak";
		}

		if(required($status)) {
			$error_status = "*Masukkan status";
		}

		if(empty($error_nama) && empty($error_harga) && empty($error_kode) && empty($error_alamat) && empty($error_telepon) && empty($error_type) && empty($error_status) && empty($error_luas_tanah) && empty($error_type) && empty($error_status)) {
			$succes = "Data Masuk.";
			$nama = $telepon = $kode = $email = $alamat = $luas_tanah = $type = $harga = $status = '';
		}
	}

?>