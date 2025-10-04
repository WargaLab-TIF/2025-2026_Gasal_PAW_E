<?php 
	include_once "function.php";
 ?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Genap</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>TABEL BILANGAN MODULUS TM-1</h1>
	<div class="form">
		<form action="index.php" method="POST">

			<div class='batas'>
				<label for="batas">Masukkan batas ukuran angka : </label>
				<input type="number" name="batas" id="batas">
			</div>

			<div class="aturan">
				<label for="aturan">Pilih Aturan :</label>
				<select id="aturan" name="aturan">
		    		<option value="bKubik">Bilangan Kubik</option>
		    		<option value="Perbatasan">Perbatasan</option>
		    		<option value="bPrima">Bilangan Prima</option>
		    		<option value="diagonal">Arsiran diagonal</option>
				</select>
			</div>

			<div class="warna">
				<label for="warna">Pilih Warna :</label>
				<select id="warna" name="warna">
		    		<option value="merah">Merah</option>
		    		<option value="biru">Biru</option>
		    		<option value="hijau">Hijau</option>
				</select>
			</div>

			<div class='submit'>
				<input type="submit" name="submit" value="submit">
			</div>
		</form>
	</div>

	<div class="output">
		<?php 
			if(isset($_POST['submit'])){
		    	$ukuran_Table = $_POST['batas'];
		    	$aturan_filter = $_POST['aturan'];
		    	$pilih_warna   = $_POST['warna'];

		    	tabel_modulus($ukuran_Table, $aturan_filter, $pilih_warna);
			}

	 	?>
	</div>
</body>
</html>
