<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INPUT</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="inputan">
		<form action="index.php" method="POST">
		<label for="batas">Masukkan Batas ukuran tabel : </label>
		<input id="batas" type="number" name="batas"><br>
		<label  for="tampilan">Pilih tampilan :</label>
		<select id="tampilan" name="tampilan">
			<option value="Belum memilih" selected>[Pilih Tampilanmu]</option>
			<option value="kuadrat">Bilangan kuadrat</option>
			<option value="catur">Papan Catur</option>
			<option value="komposit">Bilangan Komposit</option>
			<option value="diagonal">Diagonal</option>
		</select>
		<br>

		<label  for="warna">Pilih warna :</label>
		<select id="warna" name="warna">
			<option value="Belum memilih" selected>[Pilih Warnamu]</option>
			<option value="red">Merah</option>
			<option value="blue">Biru</option>
			<option value="yellow">Kuning</option>
			<option value="green">Hijau</option>
		</select>
		<br>
		<input type="submit" name="submit" value="submit">
		</form>	
	</div>
	
	<hr>
	<div class="tabel">
		<?php 
		include 'fungsi.php';

		if (isset($_POST['submit'])) {
			$tampilan=$_POST['tampilan'];
			$warna=$_POST['warna'];
			$batas=$_POST['batas'];
			atur($batas,$tampilan,$warna);

			echo "<hr>Batas Ukuran Tabel : $batas <br>";
			echo "Tampilan : $tampilan <br>";
			echo "Warna : $warna <br>";
		}

		?>
	</div>
</body>
</html>
