<?php
include 'tm1.php';

$input_ukuran = '';
$filter_terpilih = '';
$warna_terpilih = '';
$tabel_html = '';
$pesan_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $input_ukuran = $_POST['ukuran'] ?? '';
    $filter_terpilih = $_POST['filter'] ?? '';
    $warna_terpilih = $_POST['warna'] ?? '';
    
    $ukuran = intval($input_ukuran);
    if ($ukuran <= 0) {
        $pesan_error = "Kesalahan: Ukuran tabel harus bilangan bulat positif.";
    } 
    elseif (!in_array($filter_terpilih, ['kubik','prima','diagonal','perbatasan'])) {
        $pesan_error = "Kesalahan: Silakan pilih aturan filter.";
    }
    elseif (!in_array($warna_terpilih, ['orange','pink','green','yellow'])) {
    $pesan_error = "Kesalahan: Silakan pilih warna.";
}

    else {
        if ($filter_terpilih == 'kubik') {
            $nama_filter = 'Bilangan Kubik Sempurna';
        } elseif ($filter_terpilih == 'prima') {
            $nama_filter = 'Bilangan Prima';
        } elseif ($filter_terpilih == 'diagonal') {
            $nama_filter = 'Pola Diagonal';
        } else {
            $nama_filter = 'Sel Perbatasan';
        }
        
        if ($warna_terpilih == 'orange') {
            $nama_warna = 'Orange';
        } elseif ($warna_terpilih == 'pink') {
            $nama_warna = 'Pink';
        } elseif ($warna_terpilih == 'green') {
            $nama_warna = 'Hijau';
        } else {
            $nama_warna = 'Kuning';
        }

        
        $parameter_tabel = array(
            'ukuran' => $ukuran,
            'warna' => $warna_terpilih,
            'nama_warna' => $nama_warna,
            'filter' => $filter_terpilih,
            'nama_filter' => $nama_filter
        );
        
        $tabel_html = generateTabelModulus($parameter_tabel);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Generator Tabel Modulus</title>
    <link rel="stylesheet" href="tm1.css">
</head>
<body class="body-page">
    <h1 class="header-main">Generator Tabel Modulus</h1>
    
    <form method="post" action="index.php" class="form-container">
        <label for="ukuran">Batas Ukuran Tabel:</label>
        <input type="number" id="ukuran" name="ukuran" min="1" required value="<?php echo $input_ukuran; ?>">

        <label for="filter">Aturan Filter:</label>
        <select id="filter" name="filter" required>
            <option value="" disabled <?php if(empty($filter_terpilih)) echo 'selected'; ?>> Silahkan Pilih Aturan</option>
            <option value="kubik" <?php if($filter_terpilih=='kubik') echo 'selected'; ?>>Bilangan Kubik</option>
            <option value="prima" <?php if($filter_terpilih=='prima') echo 'selected'; ?>>Bilangan Prima</option>
            <option value="diagonal" <?php if($filter_terpilih=='diagonal') echo 'selected'; ?>>Diagonal</option>
            <option value="perbatasan" <?php if($filter_terpilih=='perbatasan') echo 'selected'; ?>>Perbatasan</option>
        </select>

        <label for="warna">Warna Filter:</label>
        <select id="warna" name="warna" required>
            <option value="" disabled <?php if(empty($warna_terpilih)) echo 'selected'; ?>>Silahkan Pilih Warna</option>
            <option value="orange" <?php if($warna_terpilih=='orange') echo 'selected'; ?>>Orange</option>
            <option value="pink"   <?php if($warna_terpilih=='pink')   echo 'selected'; ?>>Pink</option>
            <option value="green"  <?php if($warna_terpilih=='green')  echo 'selected'; ?>>Hijau</option>
            <option value="yellow" <?php if($warna_terpilih=='yellow') echo 'selected'; ?>>Kuning</option>
        </select>

        <button type="submit" class="generate-button">Buat Tabel Modulus</button>
        <p class="instruction-text">Silahkan pilih terebih dahulu, lalu klik tombol diatas</p>
    </form>

    <?php 
    if (!empty($pesan_error)) {
        echo "<div class='error'>$pesan_error</div>";
    }
    if (!empty($tabel_html)) {
        echo $tabel_html;
    }
    ?>
</body>
</html>
