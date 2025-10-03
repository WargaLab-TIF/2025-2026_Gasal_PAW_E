<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TM 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
	<div class="box">
		<fieldset>
			<form method="POST">
				<div class="isi">
					<label>Batas ukuran:</label>
					<input type="number" name="range" required>
				</div>
				<div class="isi">
					<label>Warna filter tampilan:</label>
					<select name="color">
						<option>Pilih warna</option>
						<option value="red">Merah</option>
						<option value="blue">Biru</option>
						<option value="green">Hijau</option>
						<option value="yellow">Kuning</option>
						<option value="grey">Abu-abu</option>
					</select>
				</div>
				<div class="isi">
					<label>Aturan filter tampilan:</label>
					<select name="rules">
						<option>Pilih aturan</option>
						<option value="satu">1. Bilangan kuadrat</option>
						<option value="dua">2. Papan catur</option>
						<option value="tiga">3. Bilangan komposit</option>
						<option value="empat">4. Arsiran diagonal</option>
					</select>
				</div>
				<div class="isi">
					<button type="Submit" name="submit">Submit</button>
				</div>
			</form>
		</fieldset>
	</div>

<?php 

if (isset($_POST['submit'])){
    $batasUkuran = $_POST['range'];
    $aturanFilter = $_POST['rules'];
    $warnaFilter = $_POST['color'];
    require_once 'function.php';

    tampilkanTabel($batasUkuran, $aturanFilter, $warnaFilter);
}

?>


</body>
</html>