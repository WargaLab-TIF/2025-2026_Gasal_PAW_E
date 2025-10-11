<?php 
	require_once 'function.php';

  $nama = $telepon = $email = $alamat = $tipe = $judul = $status = $harga = $luas ='';
  $eror_judul =$eror_tipe = $eror_nama = $eror_telepon = $eror_email = $eror_alamat = $eror_status = $eror_harga = $eror_luas = '';
  $Stipe = 'Pilih tipe...';
  $Sstatus = 'Pilih status...';

	
	if ($_SERVER['REQUEST_METHOD']== "POST") {
		$judul = $_POST['judul'];
    $tipe = $_POST['tipe'];
    $Stipe = $tipe;
    $status = $_POST['status'];
    $Sstatus = $status;
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    if (!wajib_isi($judul)) {
      $eror_judul = "Masukkan judul!!!";
      $judul = '';
    }elseif (!isjudul($judul)) {
      $eror_judul = "simbol hanya boleh titik '.' koma ',' !!!";
      $judul = '';
    }

    if (!wajib_isi($tipe)) {
      $eror_tipe = "pilih tipe!!!";
      $Stipe = 'Pilih tipe...';
    }

    if (!wajib_isi($status)) {
      $eror_status = "pilih status!!!";
      $Sstatus = 'Pilih status...';
    }

    if (!wajib_isi($alamat)) {
      $eror_alamat = "Masukkan alamat!!!";
    }elseif (!isalamat($alamat)) {
      $eror_alamat = "Masukkan format alamat!!!";
    }

    if (!wajib_isi($harga)) {
      $eror_harga = "Masukkan harga!!!";
      $harga = '';
    }

    if (!wajib_isi($luas)) {
      $eror_luas = "Masukkan luas!!!";
      $luas = '';
    }elseif (!numeric($luas)) {
      $eror_luas = "Masukkan luas harus berupa angka!!!";
    }

    if (!wajib_isi($nama)) {
      $eror_nama = "Masukkan nama!!!";
      $nama = '';
    }elseif (!alfabet($nama)) {
      $eror_nama = "Masukkan harus alfabet!!!";
      $nama = '';
    }

    if (!wajib_isi($telepon)) {
      $eror_telepon = "Masukkan nomor telepon!!!";
      $telepon = '';
    }elseif (!istelp($telepon)) {
      $eror_telepon = "Masukkan nomor!!!";
      $telepon = '';
    }

    if (!wajib_isi($email)) {
      $eror_email = "Masukkan email!!!";
      $email = '';
    }elseif (!isemail($email)) {
      $eror_email = "Masukkan format email!!!";
      $email = '';
    }
	}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Aset Properti</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php  
    if (
      empty($eror_judul) && !empty($judul) &&
      empty($eror_tipe) && !empty($tipe) &&
      empty($eror_status) && !empty($status) &&
      empty($eror_alamat) && !empty($alamat) &&
      empty($eror_harga) && !empty($harga) &&
      empty($eror_luas) && !empty($luas) &&
      empty($eror_nama) && !empty($nama) &&
      empty($eror_telepon) && !empty($telepon) &&
      empty($eror_email) && !empty($email)
    ):?>
      
      
      <?php 
          $nama = $telepon = $email = $alamat = $tipe = $judul = $status = $harga = $luas ='';
          $Stipe = 'Pilih tipe...';
          $Sstatus = 'Pilih status...';
      ?>
  <?php endif; ?>
  <div class="benar">
          <h3>Input Berhasil!</h3>
          <p>Semua data telah diisi dengan benar.</p>
      </div>
  <div class="container">
    <h1>Form Aset Properti</h1>
    <form action="index.php" method="POST">
      <label for="judul">Judul Properti</label>
      <input type="text" id="judul" name="judul" placeholder="Contoh: Rumah minimalis 2 lantai" value="<?= $judul ?>">
      <p class="error"><?= $eror_judul?></p>
  	<table>
  		<tr>
  			<th><label for="tipe">Tipe Properti</label></th>
  			<th><label for="status">Status</label></th>
  		</tr>
  		<tr>
  			<td>
  				<select id="tipe" name="tipe">
			        <option value="<?= $tipe ?>"><?= $Stipe ?></option>
			        <option value="Rumah">Rumah</option>
			        <option value="Apartemen">Apartemen</option>
			        <option value="Tanah">Tanah</option>
			        <option value="Ruko">Ruko</option>
			    </select>
          <p class="error"><?= $eror_tipe?></p>
  			</td>
  			<td>
  				<select id="status" name="status">
			        <option value="<?= $status ?>"><?= $Sstatus ?></option>
			        <option value="Dijual">Dijual</option>
			        <option value="Disewa">Disewa</option>
			    </select>
          <p class="error"><?= $eror_status?></p>
  			</td>
  		</tr>
  	</table> 
      <label for="alamat">Alamat</label>
      <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"><?= $alamat ?></textarea>
      <p class="error"><?= $eror_alamat?></p>

      <label for="harga">Harga (Rp)</label>
      <input type="text" id="harga" name="harga" placeholder="350000000" value="<?= $harga ?>">
      <p class="error"><?= $eror_harga?></p>

      <label for="luas">Luas (m²)</label>
      <input type="text" id="luas" name="luas" placeholder="120" value="<?= $luas ?>">
      <p class="error"><?= $eror_luas?></p>


      <label for="nama">Nama kontak</label>
      <input type="text" id="nama" name="nama" placeholder="Nama pemilik / agen" value="<?= $nama ?>">
      <p class="error"><?= $eror_nama?></p>

      <label for="telepon">No. Telepon</label>
      <input type="text" id="telepon" name="telepon" placeholder="0812xxxx" value="<?= $telepon ?>">
      <p class="error"><?= $eror_telepon?></p>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="nama@domain.com" value="<?= $email ?>">
      <p class="error"><?= $eror_email?></p>

      <button type="submit">Kirim</button>
    </form>
  </div>
</body>
</html>

