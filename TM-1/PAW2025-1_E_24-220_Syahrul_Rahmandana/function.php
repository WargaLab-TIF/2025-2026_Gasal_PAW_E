<?php 

function tabel_modulus($batas, $aturan, $warna){
	echo "<table>";
	echo "<tr>";
	echo "<th> </th>";
	for($i = 1; $i <= $batas; $i++){
		echo "<th> $i </th>";
	}
	echo "</tr>";
	for($x = 1; $x <= $batas; $x++){
		echo "<tr>";
		echo "<th> $x </th>";
		for($y = 1; $y <= $batas; $y++){
			$hasil = $x % $y;
			$warnanya = "";

			switch ($aturan) {
				case "bKubik":
					$akar = round(pow($hasil, 1/3));
					if($akar**3 == $hasil){
						$warnanya = $warna;
					} 
					break;
				case "Perbatasan":
					if($x == 1 || $x == $batas || $y == 1 || $y == $batas){
						$warnanya = $warna;
					}
					break;
				case "bPrima":
					$nilainya = true;
					if($hasil <= 1){
						$nilainya = false;
					}else{
                        for ($i = 2; $i * $i <= $hasil; $i++) {
                            if ($hasil % $i == 0) {
                                $nilainya = false;
                                break;
                            }
                        }
                    }
					if($nilainya){
						$warnanya = $warna;
					}
					break;
				case "diagonal":
					if($x == $y){
						$warnanya = $warna;
					}
					break;
			}
			echo "<td class ='$warnanya'>$hasil</td>";	
		}
		echo "</tr>";
	}
	echo "</table>";
}


 ?>