<?php
include 'fungsiTable.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TM_1 </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Projek TM1 - Tabel Pangkat</h2>

	<form method="post">
		<label for="batas">Masukkan Batas : </label>
		<input type="number" name="batas" id="batas"><br>

		<label for="aturan">Pilih Aturan : </label>
		<select name="aturan" id="aturan">
			<option value="kuadrat">Bilangan Kuadrat</option>
			<option value="catur">Papan Catur</option>
			<option value="komposit">Bilangan Komposit</option>
			<option value="diagonal">Arsiran Diagonal</option>
		</select><br>

		<label for="warna">Pilih Warna : </label>
		<select name="warna" id="warna">
			<option value="red">Merah</option>
			<option value="yellow">Kuning</option>
			<option value="green">Hijau</option>
			<option value="blue">Biru</option>
		</select><br><br>

		<button type="submit">Submit</button>
	</form>

	<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$batas = (int) $_POST['batas'];
		$aturan = $_POST['aturan'];
		$warna = $_POST['warna'];

		hasilTable($batas, $aturan, $warna);
	}

	?>
</body>
</html>