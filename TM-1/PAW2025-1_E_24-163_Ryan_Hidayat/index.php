<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TM-1</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="index.php" method="POST">
		<input type="number" name="batas" placeholder="Masukkan Ukuran">
		<select name="warna">
			<option selected>[Pilih Warna]</option>
			<option value="red">Merah</option>
			<option value="blue">Biru</option>
			<option value="cyan">Cyan</option>
			<option value="green">Hijau</option>
		</select>
		<select name="aturan">
			<option selected>[Pilih Aturan]</option>
			<option value="1">Bilangan Kuadrat</option>
			<option value="2">Papan Catur</option>
			<option value="3">Bilangan Komposit</option>
			<option value="4">Arsiran Diagonal (kanan atas ke kiri bawah)</option>
		</select>
		<input type="submit" value="submit">
	</form>
	<hr>
	<div>
		<?php include 'fungsi.php'; ?>
	</div>
</body>
</html>