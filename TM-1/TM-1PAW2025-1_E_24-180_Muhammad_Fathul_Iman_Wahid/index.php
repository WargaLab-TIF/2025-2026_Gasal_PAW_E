<?php
	include 'Function.php';

    $batas = 0; 
    $tabelHTML = ''; // Variabel ini akan menyimpan hasil tabel dari fungsi

    if (isset($_POST['size'])) { 
        $batas = (int)$_POST['size']; // int opsional
        $aturan = $_POST['aturan']; 
        $warna = $_POST['warna']; 

        $tabelHTML = cetaktabel($batas, $aturan, $warna); 
    }

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Praktikum genap</title>
</head>
<body>
	<h2>Tugas Praktikum Genap</h2>
	<form method="post" action="#">
		<label for="size">Masukkan batas angka: </label>
		<input type="number" name="size" id="size" min="2" required><br><br>
		
		<label for="aturan">Aturan Filter: </label>
            <select name="aturan" id="aturan">
                <option value="kubik">Bilangan Kubik</option>
                <option value="perbatasan">Pola perbatasan</option>
                <option value="prima">Bilangan Prima </option>
                <option value="diagonal">Diagonal</option>
            </select><br><br>
        
        <label for="warna">Warna Filter: </label>
            <select name="warna" id="warna">
                <option value="merah">Merah</option>
                <option value="hijau">Hijau</option>
                <option value="biru">Biru</option>
                <option value="kuning">Kuning</option>
            </select><br><br>

            <button type="submit"> Kirim</button>
		<?php echo $tabelHTML; ?>
		
	</form>

</body>
</html>
