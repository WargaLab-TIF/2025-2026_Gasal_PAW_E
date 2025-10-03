<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TM 1</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
		<fieldset>
			<form method="POST">
				<div class="isi">
					<label>Batas ukuran:</label>
					<input type="number" name="ukur">
				</div>
				<div class="isi">
					<label>Aturan filter tampilan:</label>
					<select name="atur">
						<option>Pilih aturan</option>
						<option value="satu">1. Bilangan kuadrat</option>
						<option value="dua">2. Pola papan catur</option>
						<option value="tiga">3. Bilangan komposit</option>
						<option value="empat">4. Pola arsiran diagonal</option>
					</select>
				</div>
				<div class="isi">
					<label>Warna filter tampilan:</label>
					<select name="color">
						<option>Pilih warna</option>
						<option value="green">Hijau</option>
						<option value="blue">Biru</option>
						<option value="red">Merah</option>
						<option value="violet">Ungu</option>
					</select>
				</div>
				<div class="isi">
					<button type="Submit" name="submit">Submit</button>
				</div>
			</form>
		</fieldset>
	<?php 
	if (isset($_POST['submit'])) {
	$ukuran = $_POST['ukur'];
	$aturan = $_POST['atur'];
	$warna = $_POST['color'];
	require_once 'fungsi.php';
	buatTabel($ukuran,$aturan,$warna);	
	}
	?>
</body>
</html>