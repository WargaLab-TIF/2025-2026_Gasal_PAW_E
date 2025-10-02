<?php
// index.php
// Tema: MODULUS (digit terakhir NIM-mu genap → kita pakai modulus)

require_once __DIR__ . '/functions.php';

// Nilai awal form (boleh diubah dari query string)
$batas  = isset($_GET['batas'])  ? (int)$_GET['batas']  : 5;
$aturan = isset($_GET['aturan']) ? $_GET['aturan']       : '1';
$warna  = isset($_GET['warna'])  ? $_GET['warna']        : 'biru';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>TM-1 | Tabel Modulus (NIM Genap)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Semua styling di CSS (tanpa atribut HTML) -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <main class="container">
    <h1>TM-1 — Tabel Modulus</h1>
    <p class="note">
      Tema <strong>Tabel MODULUS</strong> karena 240411100082 digit terakhir NIM genap.

    </p>

  <form class="controls" method="get">
      <label>
        Batas ukuran (baris × kolom)
        <input type="number" name="batas" min="1" value="<?= htmlspecialchars($batas) ?>" required>
      </label>

      <label>
        Aturan penandaan
      <select name="aturan" required>
        <option value="1" <?= $aturan==='1'?'selected':''; ?>>Warnai bilangan kubik (n³)</option>
        <option value="2" <?= $aturan==='2'?'selected':''; ?>>Pola perbatasan (outer border)</option>
        <option value="3" <?= $aturan==='3'?'selected':''; ?>>Warnai bilangan prima</option>
        <option value="4" <?= $aturan==='4'?'selected':''; ?>>Arsiran diagonal ↘ (kiri-atas → kanan-bawah)</option>
        <option value="5" <?= $aturan==='5'?'selected':''; ?>>Pola papan catur (persegi)</option>
      </select>
      </label>

      <label>
        Warna
        <select name="warna" required>
          <option value="" disabled hidden <?= $warna===''?'selected':''; ?>>— Pilih warna —</option>
          <option value="biru"   <?= $warna==='biru'?'selected':'';   ?>>Biru</option>
          <option value="hijau"  <?= $warna==='hijau'?'selected':'';  ?>>Hijau</option>
          <option value="kuning" <?= $warna==='kuning'?'selected':''; ?>>Kuning</option>
          <option value="merah"  <?= $warna==='merah'?'selected':'';  ?>>Merah</option>
        </select>
      </label>

      <button type="submit">Terapkan</button>
    </form>

    <?php
      echo buatTabelModulus($batas, $aturan, $warna);
    ?>

    <footer class="foot">
      <small>Pastikan valid HTML5 (W3C Validator). Hindari font “Times New Roman”.</small>
    </footer>
  </main>
</body>
</html>
