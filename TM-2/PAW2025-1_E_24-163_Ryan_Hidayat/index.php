<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Real Estate</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<main>
		<?php require "validasi.php"; ?>
		<form action="index.php" method="POST">
			<div class="head">
				<h2>- Customer -</h2>
				<hr><br>
				<div class="plot">
					<label for="nama">Nama lengkap</label>
					<input type="text" name="nama" value="<?= $nama ?>" id="nama">			
				</div>
				<div class="error"><?= $error_nama; ?></div>
				<div class="plot">
					<label for="NIK">NIK</label>
					<input type="text" name="NIK" value="<?= $NIK ?>" id="NIK">			
				</div>
				<div class="error"><?= $error_NIK; ?></div>
				<div class="plot">
					<label for="telepon">No. telepon</label>
					<input type="text" name="telepon" value="<?= $telepon ?>" id="telepon">
				</div>
				<div class="error"><?= $error_telepon; ?></div>
				<div class="plot">
					<label for="kode">Kode Booking</label>
					<input type="text" name="kode" value="<?= $kode ?>" id="kode">
				</div>
				<div class="error"><?= $error_kode; ?></div>
			</div>
			<div class="container">
				<h2>- Aset -</h2>
				<hr><br>
				<label for="alamat">Alamat lengkap</label>
				<textarea name="alamat" id="alamat"><?= $alamat ?></textarea>
				<div class="error"><?= $error_alamat; ?></div>
				<div class="plot">
					<label for="luas_tanah">Luas Tanah</label>
					<input type="text" name="luas_tanah" value="<?= $luas_tanah ?>" id="luas_tanah">
				</div>
				<div class="error"><?= $error_luas_tanah; ?></div>
				<div class="plot">
					<label for="type">Type Properti</label>
					<select name="type" id="type">
						<option value="" <?php if($type == "") echo "selected" ?>>-- Pilih type --</option>
						<option value="rumah" <?php if($type == "rumah") echo "selected" ?>>Rumah</option>
						<option value="apartemen" <?php if($type == "apartemen") echo "selected" ?>>Apartemen</option>
						<option value="tanah_kosong" <?php if($type == "tanah_kosong") echo "selected" ?>>Tanah kosong</option>
						<option value="ruko" <?php if($type == "ruko") echo "selected" ?>>Ruko</option>
						<option value="kost" <?php if($type == "kost") echo "selected" ?>>Kost</option>
					</select>
				</div>
				<div class="error"><?= $error_type; ?></div>
				<div class="plot">
					<label for="harga">Harga</label>
					<input type="text" name="harga" value="<?= $harga ?>" id="harga">
					<select name="status">
						<option value="" <?php if($status == "") echo "selected" ?>>-- Pilih status --</option>
						<option value="beli" <?php if($status == "beli") echo "selected" ?>>Beli</option>
						<option value="sewa" <?php if($status == "sewa") echo "selected" ?>>Sewa</option>
					</select>
				</div>
				<div class="error end">
					<div><?= $error_harga; ?></div>
					<div><?= $error_status; ?></div>
				</div>
				<button type="submit" name="submit">Submit</button>
				<div class="sukses"><?= $succes; ?></div>
			</div>
		</form>
	</main>
	
</body>
</html>