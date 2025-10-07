<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TM 1</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<div class="box">
		<fieldset>
			<form method="POST">
				<div class="isi">
					<label>Batas ukuran:</label>
					<input type="number" name="ukur" required>
				</div>
				<br>
				<div class="isi">
					<label>Aturan filter tampilan:</label>
					<select name="atur">
						<option value="satu">Bilangan kuadrat</option>
						<option value="dua">Papan catur</option>
						<option value="tiga">Bilangan komposit</option>
						<option value="empat">Arsiran diagonal</option>
					</select>
				</div>
				<br>
				<div class="isi">
					<label>Warna filter tampilan:</label>
					<select name="color">
						<option value="green">Hijau</option>
						<option value="blue">Biru</option>
						<option value="red">Merah</option>
						<option value="purple">Ungu</option>
					</select>
				</div>
				<br>
				<div class="isi">
					<button type="Submit" name="submit">Submit</button>
				</div>
			</form>
		</fieldset>
	</div>
	<?php 
	if (isset($_POST['submit'])) {
	$ukuran = $_POST['ukur'];
	$aturan = $_POST['atur'];
	$warna = $_POST['color'];
	require_once 'function.php';
	langkah1($ukuran,$aturan,$warna);	
	}
	?>
</body>
</html>