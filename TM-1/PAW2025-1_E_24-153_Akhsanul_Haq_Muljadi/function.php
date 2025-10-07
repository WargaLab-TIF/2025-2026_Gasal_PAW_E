<?php
function langkah1($ukuran, $aturan, $warna){
	echo "<table>";
	echo "<tr>";
	echo "<th></th>";
	for($i=1; $i<=$ukuran; $i++) {
		echo "<th>$i</th>";
	}
	echo "</tr>";

	if ($aturan == 'satu') {
		for($j=1; $j<=$ukuran; $j++) {
			echo "<tr>";
			echo "<th>$j</th>";
			for($k=1; $k<=$ukuran; $k++){
				$hasil = $j**$k;
				$akar = sqrt($hasil);
				if ( $akar == floor($akar)) {
					echo "<td style='background-color:$warna'>$hasil</td>";
				}else{
					echo "<td>$hasil</td>";
				}
			}
			echo "</tr>";
		}
	} elseif ($aturan == 'dua') {
		for($j=1; $j<=$ukuran; $j++) {
			echo "<tr>";
			echo "<th>$j</th>";
			for($k=1; $k<=$ukuran; $k++){
				$hasil = $j**$k;
				if (($j + $k) % 2 == 0) {
					echo "<td style='background-color:$warna'>$hasil</td>";
				}else{
					echo "<td>$hasil</td>";
				}
			}
			echo "</tr>";
		}
	} elseif ($aturan == 'tiga') {
		for($j=1; $j<=$ukuran; $j++) {
			echo "<tr>";
			echo "<th>$j</th>";
			for($k=1; $k<=$ukuran; $k++){
				$hasil = $j**$k;
				$komposit = 0;
				for($x=1; $x<= $hasil; $x++) {
					if ($hasil % $x == 0) {
						$komposit++;
					}
					if ($komposit > 2) {
						break;
					}
				}
				if ($komposit > 2) {
					echo "<td style='background-color:$warna'>$hasil</td>";
				} else {
					echo "<td>$hasil</td>";
				}
			}
			echo "</tr>";
		}
	} elseif ($aturan == 'empat') {
		$temp = $ukuran;
		for($j=1; $j<=$ukuran; $j++) {
			echo "<tr>";
			echo "<th>$j</th>";
			for($k=1; $k<=$ukuran; $k++){
				$hasil = $j**$k;
				if ($temp == $k){
					echo "<td style='background-color:$warna'>$hasil</td>";
				} else {
					echo "<td>$hasil</td>";
				}
			}
			$temp -= 1;
			echo "</tr>";
		}
	}
	echo "</table>";
}
?>