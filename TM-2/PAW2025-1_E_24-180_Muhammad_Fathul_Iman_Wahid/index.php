<?php
require_once "function.php";

$nama = $nip = $alamat = $jeniskelamin = $nomortelepon = $kodepegawai = "";
$error_nama = $error_nip = $error_alamat = $error_jeniskelamin = $error_nomortelepon = $error_kodepegawai = "";
$pesan_sukses = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$nama = test_input($_POST['nama']);
	$nip = test_input($_POST['nip']);
	$alamat = test_input($_POST['alamat']);
	$jeniskelamin = $_POST['jeniskelamin'] ?? '';
	$nomortelepon = test_input($_POST['nomortelepon']);
	$kodepegawai = test_input($_POST['kodepegawai']);


	// Validasi Nama
	if (!wajib_isi($nama)){
		$error_nama	= "Nama wajib diisi";
	} elseif (!alfabet($nama)){
		$error_nama	= "Nama hanya boleh huruf dan spasi";
	} elseif (strlen($nama) < 3){
		$error_nama	= "Nama hanya boleh lebih dari 3 karakter";
	}

	// Validasi nip
	if (!wajib_isi($nip)){
		$error_nip	= "NIP wajib diisi";
	} elseif(!numerik($nip)){
		$error_nip	= "nip hanya boleh angka";
	} elseif(strlen($nip) != 8){
		$error_nip	= "nip harus 8 karakter";
	}

	// Validasi alamat
	if (!wajib_isi($alamat)){
		$error_alamat = "Alamat wajib diisi";
	} elseif(strlen($alamat) < 5){
		$error_alamat = "alamat terlalu pendek";
	}

	// Validasi jenis kelamin
	if (!wajib_isi($jeniskelamin)){
		$error_jeniskelamin = "Jenis kelamin wajib diisi";
	}

	// Validasi nomor telepon
	if (!wajib_isi($nomortelepon)){
		$error_nomortelepon = "Nomor Telepon wajib diisi";
	} elseif(!numerik($nomortelepon)){
		$error_nomortelepon = "Nomor telepon wajin angka";
	} elseif(strlen($nomortelepon) < 10 || strlen($nomortelepon) > 13){
        $error_nomortelepon = "Nomor telepon harus 10–13 digit";
    }

     // Validasi Kode Pegawai
    if (!wajib_isi($kodepegawai)){
     	$error_kodepegawai = "Kode Pegawai Harus Diisi";
    } elseif (!alfanumerik($kodepegawai)){
    	$error_kodepegawai = "Kode Pegawai hanya boleh huruf dan angka tanpa spasi/simbol";
    } elseif (strlen($kodepegawai)!= 5 ){
    	$error_kodepegawai = "Kode Pegawai harus 5 karakter";
    }

    if (
    empty($error_nama) &&
    empty($error_nip) &&
    empty($error_alamat) &&
    empty($error_jeniskelamin) &&
    empty($error_nomortelepon) &&
    empty($error_kodepegawai)
) {	
    $pesan_sukses = "<div class='sukses'>
    <h3>Data berhasil dimasukkan!</h3>
    <p>Nama: $nama</p>
    <p>NIP: $nip</p>
    <p>Alamat: $alamat</p>
    <p>Jenis Kelamin: $jeniskelamin</p>
    <p>Nomor Telepon: $nomortelepon</p>
    <p>Kode Pegawai: $kodepegawai</p>
    <a href='index.php'>Kembali ke formulir</a>
    </div>";
	}
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Membuat validasi</title>
</head>
<body>
<?php if (!empty($pesan_sukses)): ?>
	<?= $pesan_sukses ?>
<?php else: ?>
	
	<form action="index.php" method="POST">
		<table>
			<tr>
				<td>
					<label>Nama Lengkap:</label>
				</td>
				<td>
					<input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
					<div class="error"><?= $error_nama ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>NIP:</label>
				</td>
				<td>
					<input type="text" name="nip" value="<?= htmlspecialchars($nip) ?>">
					<div class="error"><?= $error_nip ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Alamat</label>
				</td>
				<td>
					<input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>">
					<div class="error"><?= $error_alamat ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Jenis Kelamin:</label>
				</td>
				<td>
					<input type="radio" name="jeniskelamin" value="laki" <?= ($jeniskelamin == 'laki') ? 'checked' : '' ?>>Laki-laki
					<input type="radio" name="jeniskelamin" value="perempuan" <?= ($jeniskelamin == 'perempuan') ? 'checked' : '' ?>>perempuan
					<div class="error"><?= $error_jeniskelamin ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Nomor Telepon</label>
				</td>
				<td>
					<input type="text" name="nomortelepon" value="<?= htmlspecialchars($nomortelepon) ?>">
					<div class="error"><?= $error_nomortelepon ?></div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Kode Pegawai</label>
				</td>
				<td>
					<input type="text" name="kodepegawai" value="<?= htmlspecialchars($kodepegawai) ?>">
					<div class="error"><?= $error_kodepegawai ?></div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" name="submit">Kirim</button>
				</td>
			</tr>
		</table>
	</form>
<?php endif;?>
</body>
</html>