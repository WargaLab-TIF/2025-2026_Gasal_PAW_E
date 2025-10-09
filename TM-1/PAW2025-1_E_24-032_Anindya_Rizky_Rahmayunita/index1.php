<?php
// Wajib: Memanggil file eksternal yang berisi fungsi-fungsi
require_once 'func.php'; 

// Pastikan data dikirim melalui metode POST, jika tidak, arahkan kembali
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['batas'])) {
    header('Location: index.html'); 
    exit;
}

// Ambil dan bersihkan data dari form
$batas = filter_input(INPUT_POST, 'batas', FILTER_VALIDATE_INT);
$aturan = filter_input(INPUT_POST, 'aturan', FILTER_SANITIZE_STRING);
$warna = filter_input(INPUT_POST, 'warna', FILTER_SANITIZE_STRING);

// Pastikan batas adalah integer positif
if ($batas === false || $batas < 1) {
    echo "<p style='color:red;'>Input batas tidak valid. Silakan kembali ke formulir.</p>";
    exit;
}

// --- TAMPILAN HTML HASIL ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Hasil Tabel Modulus</title>
    <style>
        /* **PERBAIKAN CSS DIMULAI DI SINI** */
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #343a40;
            line-height: 1.6;
        }
        h2, h3 {
            color: #007bff;
            text-align: center;
            margin-bottom: 25px;
        }

        /* Tabel di Tengah dan Border Hitam */
        .table-container {
            margin: 20px auto; 
            max-width: fit-content; 
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
        }

        table.modulus {
            border-collapse: collapse;
            min-width: 500px; 
        }

        table.modulus th, table.modulus td {
            border: 1px solid black; /* **BORDER HITAM** */
            padding: 10px;
            text-align: center;
            font-weight: bold; /* **ANGKA TEBAL** */
            color: #343a40; 
            background-color: white; /* **BACKGROUND SEL DATA DEFAULT PUTIH** */
        }

        /* HEADER BIRU SERAGAM (Kecuali Header Sudut) */
        table.modulus thead th {
            background-color: #007bff; /* **HEADER KOLOM BIRU** */
            color: white; 
            font-weight: bold;
        }
        
        /* HEADER SUDUT (Sel *): Biru */
        table.modulus thead tr:first-child th:first-child {
            background-color: #007bff; 
            color: white;
        }

        /* **PERBAIKAN UTAMA**: HEADER BARIS (Angka 1, 2, 3, ... di kolom kiri) */
        table.modulus tbody th {
            background-color: #007bff; /* **HEADER BARIS BIRU (Disamakan)** */
            font-weight: bold;
            color: white; /* Teks Putih agar kontras */
        }
        
        /* Hilangkan efek striping dan hover */
        table.modulus tbody tr:nth-child(even),
        table.modulus tbody tr:hover {
            background-color: inherit; 
        }

        /* Warna Khusus (Warna filter) - HARUS MENIMPA BACKGROUND PUTIH DEFAULT */
        .warna-merah { 
            background-color: #dc3545 !important; /* **PENTING: Gunakan !important jika pewarnaan gagal** */
            color: white; 
            font-weight: bold; 
        }
        .warna-hijau { 
            background-color: #28a745 !important; 
            color: white; 
            font-weight: bold; 
        }
        .warna-biru { 
            background-color: #007bff !important; 
            color: white; 
            font-weight: bold; 
        }
    </style>
</head>
<body>
    <p><a href="index.html">← Kembali ke Formulir</a></p>
    <h2>Hasil Tabel Modulus</h2>

    <?php
    // Panggil fungsi untuk menampilkan tabel
    tampilkanTabelModulus($batas, $aturan, $warna);
    ?>

</body>
</html>