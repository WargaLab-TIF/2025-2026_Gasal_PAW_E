<?php
	if(isset($_POST['batas'])) {
		$ukuran = $_POST['batas'];
		$warna = $_POST['warna'];
		$aturan = $_POST['aturan'];
		table($ukuran, $aturan, $warna);
	}

	function table($ukuran, $aturan, $warna) {
		echo "<table>";
		$target = $ukuran;
		for ($i = 0;$i <= $ukuran;$i++) {
			echo '<tr>';
			if($i == 0) {
				echo "<th></th>";
				for($j = 1;$j <= $ukuran;$j++) {
					echo "<th>$j</th>";
				}
			}elseif ($i > 0) {
				echo "<th>$i</th>";
				for ($k = 1;$k <= $ukuran;$k++) {
					$hasil = $i ** $k;
					if ($aturan == 1) {
						$kuad = false;
						for($n = 0;$n <= $hasil;$n++){
							if($n * $n == $hasil){
								$kuad = true;
								break;
							}
							if($n * $n > $hasil){
								break;
							}
						}
						if($kuad){
							echo "<td style='background-color:$warna;'>";
						} else {
							echo "<td>";
						}
						// echo gettype($akar);
					} elseif (($i + $k) % 2 == 1 and $aturan == 2) {
						echo "<td style='background-color:$warna;'>";
					} elseif ($aturan == 3) {	
						$count = 0;	
						$h = false;	
						for($l = 1;$l <= $hasil;$l++) {
							if($hasil % $l == 0) {
								$count++;
							}
							if ($count >= 3){
								$count = 0;
								$h = true;
								break;
							}
						}
						if ($h){
							echo "<td style='background-color:$warna;'>";
							$h = false;
						} else {
							echo '<td>';
						}
					} elseif ($aturan == 4) {
						if($k == $target) {
							echo "<td style='background-color:$warna;'>";
							$target--;	
						} else {
							echo '<td>';
						}
					}else {
						echo '<td>';
					}
					echo "$hasil</td>";
				}
			echo '</tr>';
			}
		}
		echo "</table>";
	}
?>