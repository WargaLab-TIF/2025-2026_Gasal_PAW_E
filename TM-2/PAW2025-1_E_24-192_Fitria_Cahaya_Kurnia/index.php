<?php 
require_once 'fungsi.php';

$nama = "";
$telepon = "";
$gender = "";
$email ="";
$alamat = "";
$NIK = "";
$tanggal = "";
$jabatan ="";
$kerja="";
$gaji="";

$error_nama = "";
$error_telepon = "";
$error_gender = "";
$error_email ="";
$error_alamat = "";
$error_NIK = "";
$error_tanggal = "";
$error_jabatan ="";
$error_kerja="";
$error_gaji="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST['nama']);
	$telepon = test_input($_POST['telepon']);
	$email = test_input($_POST['email']);
	$alamat = test_input($_POST['alamat']);
	$NIK = test_input($_POST['NIK']);
	$tanggal = test_input($_POST['tgl']);
	$jabatan =test_input($_POST['jabatan']);
	$kerja=test_input($_POST['kerja']);
	$gaji=test_input($_POST['gaji']);
	if (isset($_POST['gender'])){
		$gender = $_POST['gender'];
	}
	
	//nama (alfabet)
	if (wajib_isi($nama)) {
		$error_nama = "wajib di isi";
	} elseif (!alfabet($nama)) {
		$error_nama = "masukkan wajib alfabet";
	}

	//tanggal
	if (wajib_isi($tanggal)){
		$error_tanggal = "isi tanggal terlebih dahulu";
	}
	// telepon (angka)
	if (wajib_isi($telepon)) {
		$error_telepon = "wajib di isi";
	} elseif (!numeric($telepon)) {
		$error_telepon = "masukkan wajib numeric";
	}

	//gender
	if (wajib_isi($gender) ) {
		$error_gender = "wajib di isi";
	} 

	// email
	if (wajib_isi($email)) {
		$error_email = "wajib di isi";
	} elseif (!email($email)) {
		$error_email = "masukkan wajib email";
	}

	//alamat
	if (wajib_isi($alamat)) {
		$error_alamat = "wajib di isi";
	} elseif (!alamat($alamat)) {
		$error_alamat = "masukkan tidak boleh kurang dari 5 & lebih dari 30 karakter";
	} 


	//NIK
	if (wajib_isi($NIK)) {
		$error_NIK = "wajib di isi";
	} elseif (!panjang_digit($NIK)) {
		$error_NIK = "masukkan harus angka & tidak boleh lebih dari 16";
	}

	if (wajib_isi($jabatan)) {
		$error_jabatan = "wajib di isi";
	} elseif (!alfabet($jabatan)) {
		$error_jabatan = "masukkan wajib alfabet";
	}

	if (wajib_isi($kerja)) {
		$error_kerja = "wajib di isi";
	} elseif (!alfabet($kerja)) {
		$error_kerja = "masukkan wajib alfabet";
	}

	if (wajib_isi($gaji)) {
		$error_gaji = "wajib di isi";
	} elseif (!numeric($gaji)) {
		$error_gaji = "masukkan wajib numeric";
	}


	if (empty($error_nama) && empty($error_telepon) && empty($error_gender) && empty($error_email) && empty($error_alamat) && empty ($error_NIK) && empty($error_tanggal) && empty($error_jabatan) && empty($error_kerja) && empty($error_gaji)) {
	$pesan_sukses = "Berhasil memasukkan data";
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Kepegawaian</title>
	<link rel="stylesheet" type="text/css" href="stylebr.css">
</head>
<body>

	<?php if (!empty($pesan_sukses)) : ?>
		<p style="color: green; font-weight: bold;">
			<?= $pesan_sukses ?>
		</p>
	<?php endif; ?>

	<form method="POST">
		
		<h1>FORMULIR DATA KARYAWAN</h1>

		<fieldset>
		<legend>BIODATA CALON KARYAWAN</legend>
		
		<div class="div">
		<label>Nama Pegawai:</label>
		<input type="text" name="nama" value="<?= $nama?>">
		<div class="error"><?= "$error_nama" ?></div>

		<label>NIK:</label>
		<input type="text" name="NIK" value="<?= $NIK ?>">
		<div class="error"><?= "$error_NIK" ?></div>

		<div class="tanggal">
		<label>Tanggal Lahir:</label>
		<input type="date" name="tgl" value="<?= $tanggal ?>">
		<div class="error"><?= "$error_tanggal" ?></div>

		<div class="gender">
		<label>Jenis Kelamin:</label>
		<input type="radio" name="gender" value="man"> Laki-Laki
		<input type="radio" name="gender" value="woman" > Perempuan
		<div class="error"> <?= $error_gender ?> </div>
		</div>

		</div>
		
		<label>No Handphone:</label>
		<input type="text" name="telepon" value="<?= $telepon ?>">
		<div class="error"><?= "$error_telepon" ?></div>

		<label>Email:</label>
		<input type="text" name="email" value="<?= $email ?>">
		<div class="error"> <?= $error_email ?>  </div>

		<label>Alamat:</label>
		<input type="text" name="alamat" value=" <?= $alamat ?>" >
		<div class="error"><?= $error_alamat ?></div>

		</div>
		</fieldset>

		<fieldset>
		<legend> POSISI/JABATAN YANG DILAMAR</legend>

		<div class="div">
		<label>Jabatan:</label>
		<input type="text" name="jabatan" value="<?= $jabatan ?>" >
		<div class="error"><?=$error_jabatan ?></div>

		<label>Unit Kerja:</label>
		<input type="text" name="kerja" value="<?= $kerja ?>" >
		<div class="error"><?=$error_kerja ?></div>

		<label>Nominal Gaji:</label>
		<input type="text" name="gaji" value="<?= $gaji ?> " >
		<div class="error"><?=$error_gaji ?></div>
		</div>
		</fieldset>
		
		<button type="submit" name="submit">Kirim</button>
		
	</form>
</body>
</html>