<?php
function isPrima(int $n): bool {
  if ($n < 2) return false;
  if ($n % 2 === 0) return $n === 2;
  $akar = (int)floor(sqrt($n));
  for ($i = 3; $i <= $akar; $i += 2) {
    if ($n % $i === 0) return false;
  }
  return true;
}

function isKubik(int $n): bool {
  
  if ($n < 0) return false;
  $akarTiga = (int)round(pow($n, 1/3));
  return $akarTiga * $akarTiga * $akarTiga === $n;
}
function buatTabelModulus(int $batas, string $aturan, string $warna): string {
  if ($batas < 1) $batas = 1;

  $warnaClass = 'warna-' . preg_replace('/[^a-z]/','', strtolower($warna));
  $aturan = in_array($aturan, ['1','2','3','4','5'], true) ? $aturan : '1';
  $extraTableClass = ($aturan === '5') ? ' checker' : '';
  $pakaiHeader = ($aturan !== '5');


  ob_start();
  echo '<table class="grid ' . htmlspecialchars($warnaClass . $extraTableClass) . '">';

  if ($pakaiHeader) {
    echo '<thead><tr><th>r\c</th>';
    for ($kolom = 1; $kolom <= $batas; $kolom++) {
      echo '<th scope="col">' . $kolom . '</th>';
    }
    echo '</tr></thead>';
  }

  echo '<tbody>';
  for ($baris = 1; $baris <= $batas; $baris++) {
    echo '<tr>';
    if ($pakaiHeader) {
      echo '<th scope="row">' . $baris . '</th>';
    }

    for ($kolom = 1; $kolom <= $batas; $kolom++) {
      $nilai = $baris % $kolom;

      $tandai = false;
      switch ($aturan) {
        case '1': 
          $tandai = isKubik($nilai);
          break;
        case '2': 
          $tandai = ($baris === 1 || $kolom === 1 || $baris === $batas || $kolom === $batas);
          break;
        case '3': 
          $tandai = isPrima($nilai);
          break;
        case '4': 
          $tandai = ($baris === $kolom);
          break;
        case '5': 
          $tandai = (($baris + $kolom) % 2 === 0);
          break;
      }

      $cls = $tandai ? ' mark' : '';
      echo '<td class="cell' . $cls . '">' . $nilai . '</td>';
    }
    echo '</tr>';
  }
  echo '</tbody></table>';

  return ob_get_clean();
}
