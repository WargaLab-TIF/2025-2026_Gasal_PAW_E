<?php 
	require_once 'function.php';
	
	if ($_SERVER['REQUEST_METHOD']== "POST") {
		
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
  <div class="container">
    <h1>Form Aset Properti</h1>
    <form action="index.php" method="POST">
      <label for="judul">Judul Properti</label>
      <input type="text" id="judul" name="judul" placeholder="Contoh: Rumah minimalis 2 lantai">
  	<table>
  		<tr>
  			<th><label for="tipe">Tipe Properti</label></th>
  			<th><label for="status">Status</label></th>
  		</tr>
  		<tr>
  			<td>
  				<select id="tipe" name="tipe">
			        <option value="">Pilih tipe...</option>
			        <option value="Rumah">Rumah</option>
			        <option value="Apartemen">Apartemen</option>
			        <option value="Tanah">Tanah</option>
			        <option value="Ruko">Ruko</option>
			    </select>
  			</td>
  			<td>
  				<select id="status" name="status">
			        <option value="">Pilih status...</option>
			        <option value="Dijual">Dijual</option>
			        <option value="Disewa">Disewa</option>
			    </select>
  			</td>
  		</tr>
  	</table> 
      

      <label for="alamat">Alamat</label>
      <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"></textarea>

      <label for="harga">Harga (Rp)</label>
      <input type="text" id="harga" name="harga" placeholder="350000000">

      <label for="luas">Luas (m²)</label>
      <input type="text" id="luas" name="luas" placeholder="120">

      <label for="kontak">Nama Kontak</label>
      <input type="text" id="kontak" name="kontak" placeholder="Nama pemilik / agen">

      <label for="telepon">No. Telepon</label>
      <input type="text" id="telepon" name="telepon" placeholder="0812xxxx">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="nama@domain.com">

      <button type="submit">Kirim</button>
    </form>
  </div>
</body>
</html>