<?php
// Tema GANJIL - NIM: 240411100075

function is_prima($n) {
  if ($n <= 1) return false;
  for ($i = 2; $i <= sqrt($n); $i++) {
    if ($n % $i == 0) return false;
  }
  return true;
}

function fungsi($ukuran, $aturan, $warna) {
  // Header kolom
  echo "<tr><th>*</th>";
  for ($j = 1; $j <= $ukuran; $j++) echo "<th>$j</th>";
  echo "</tr>";

  // Isi tabel
  for ($i = 1; $i <= $ukuran; $i++) {
    echo "<tr><th>$i</th>"; // Header baris
    for ($j = 1; $j <= $ukuran; $j++) {
      $nilai = pow($i, $j); // Baris dipangkatkan kolom
      $warnai = false;

      switch ($aturan) {
        case "kuadrat":
          if (sqrt($nilai) == floor(sqrt($nilai))) $warnai = true;
          break;
        case "catur":
          if (($i + $j) % 2 == 0) $warnai = true;
          break;
        case "komposit":
          if ($nilai > 1 && !is_prima($nilai)) $warnai = true;
          break;
        case "diagonal":
          if ($i + $j == $ukuran + 1) $warnai = true;
          break;
      }

      $style = $warnai ? "style='background:$warna'" : "";
      echo "<td $style>$nilai</td>";
    }
    echo "</tr>";
  }
}
?>
