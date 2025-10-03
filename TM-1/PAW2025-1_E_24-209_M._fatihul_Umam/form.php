<?php 

  function Table ($ukuran, $aturan, $warna){


  }

  function Kuadrat ($ukuran, $warna){
    echo "<Table border='1'>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0) {
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
    echo "<Table border='1'>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0) {
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
    echo "<Table>";
      echo "<tr>";
        echo "<td>";
          
        echo "</td>";
      echo "</tr>"; 
    echo "</Table>";
  }

  function Diagonal ($ukuran, $warna){
    echo "<Table border='1'>";
    for ($i=0; $i <= $ukuran; $i++) { 
      echo "<tr>";
      $cek = $ukuran+1;
      for ($j=0; $j <= $ukuran; $j++) { 
            if ($i == 0) {
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

 ?>

