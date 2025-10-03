<?php 

  function Table ($ukuran, $aturan, $warna){
    switch ($aturan) {
      case '1':
        Kuadrat($ukuran, $warna);
        break;
      case '2':
        Catur($ukuran, $warna);
        break;
      case '3':
        Komposit($ukuran, $warna);
        break;
      case '4':
        Diagonal($ukuran, $warna);
        break;
      default:
        break;
    }

  }

  function Kuadrat ($ukuran, $warna){
    echo "<Table>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      for ($j=0; $j <= $ukuran; $j++) {
            if ($i == 0 && $j == 0) {
                echo "<th> </th>";
             }elseif ($i == 0) {
                echo "<th>$j</th>";
            }elseif ($j == 0) {
                echo "<th>$i</th>";
            }else{
                $nilai = $i**$j;
                $akar = sqrt($nilai);
                if ($akar * $akar == $nilai) {
                    echo "<td style='background-color:$warna;'>".$nilai."</td>";
                }else{
                     echo "<td>".$nilai."</td>";
                }
            }
      }
      echo "</tr>"; 
    }    
    echo "</Table>";
  }

  function Catur ($ukuran, $warna){
    echo "<Table>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0 && $j == 0) {
                echo "<th></th>";
             }elseif ($i == 0) {
                echo "<th>$j</th>";
            }elseif ($j == 0) {
                echo "<th>$i</th>";
            }else{
                $nilai = $i**$j;
                if ($i % 2 == 1 && $j % 2 == 0) {
                    echo "<td style='background-color:$warna;'>".$nilai."</td>";
                }elseif ($i % 2 == 0 && $j % 2 == 1) {
                    echo "<td style='background-color:$warna;'>".$nilai."</td>";
                }else{
                     echo "<td>".$nilai."</td>";
                }
            }
      }
      echo "</tr>"; 
    }    
    echo "</Table>";
  }

  function Komposit ($ukuran, $warna){
    echo "<table border='1'>";
    for ($i=0; $i <= $ukuran; $i++) { 
        echo "<tr>";
        for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0 && $j == 0) {
                echo "<th> </th>";
             }elseif ($i == 0) {
                echo "<th>$j</th>";
            } elseif ($j == 0) {
                echo "<th>$i</th>";
            } else {
                $nilai = $i ** $j;
                if (cekPrima($nilai)) {
                    echo "<td style='background-color:lightgreen;'>$nilai</td>";
                }else {
                    echo "<td>$nilai</td>";
                }
            }
        }
        echo "</tr>"; 
    }    

    echo "</table>";
  }

  function Diagonal ($ukuran, $warna){
    echo "<Table>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      $cek = $ukuran+1;
      for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0 && $j == 0) {
                echo "<th> </th>";
             }elseif ($i == 0) {
                echo "<th>$j</th>";
            }elseif ($j == 0) {
                echo "<th>$i</th>";
            }else{
                $nilai = $i**$j;
                if ($i == $cek) {
                    echo "<td style='background-color:$warna;'>".$nilai."</td>";
                }else{
                     echo "<td>".$nilai."</td>";
                }
            }
            $cek--;
      }
      echo "</tr>"; 
    }    
    echo "</Table>";
  }

  function cekPrima($n) {
      if ($n >= 2) {
          for ($i = 2; $i < $n; $i ++) {
              if ($n % $i == 0) {
                  return True;
              }
          }
      }else{
          return False;
      }

      return False;
  }

?>


