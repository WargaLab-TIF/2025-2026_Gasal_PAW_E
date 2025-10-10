<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table pangkat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">TM 1 | Table pangkat</h1>
    <div class="form">      
        <form action="#" method="post">
            <label for="batas">Batas:</label>
            <input type="number" name="batas" id="batas"><br>
            <label for="aturan">Aturan:</label>
            <select name="aturan" id="aturan">
                <option value="bilangan_kuadrat">Bilangan kuadrat</option>
                <option value="pola_papan_catur">Pola papan catur</option>
                <option value="bilangan_komposit">Bilangan Komposit</option>
                <option value="arsiran_diagonal">Arsiran Diagonal (kanan atas ke kiri bawah)</option>
                <option value="bistop_move">Bistop move</option>
                <option value="rock_move">Rock move</option>
                <option value="queen_move">Queen move</option>
                <option value="snake">Snake</option>
        </select>
        <label for="warna">Warna :</label>
        <select name="warna" id="warna">
            <option value="biru">Biru</option>
            <option value="merah">Merah</option>
            <option value="kuning">Kuning</option>
        </select><br>
        <button type="reset">Reset</button>
        <button type="submit" name="submit">Kirim</button>
    </form>
</div>
    <div class="display-tabel">
        <?php 
            if(isset($_POST['submit'])){
                displayTable($_POST['batas'],$_POST['aturan'],$_POST['warna']);
            }
        ?>
    </div>
</body>
</html>