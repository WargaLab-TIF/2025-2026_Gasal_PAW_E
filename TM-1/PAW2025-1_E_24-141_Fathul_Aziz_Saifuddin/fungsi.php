<?php 
function atur($limit,$display,$color)
{
	echo "<table>";
		for ($i=0; $i <= $limit ; $i++) { 
			if ($i==0) {
				echo "<tr><th></th>";
				for ($j=1; $j <= $limit; $j++) { 
					echo "<th>$j</th>";
				}
				echo "</tr>";
			}
			else {
				for ($j=0; $j <= $limit; $j++){
					if ($j==0){
						echo "<tr><th>$i</th>";
					} else {
						$view=$i**$j;
						$cond=false;
						if ($display=='kuadrat') {
							$akar=$view**0.5;
							if ($akar==(int)$akar){
								$cond=true;
							}
							// for ($count=1; $count <= $view; $count++) {
							// 	if ($count**2==$view){
							// 		$cond=true;
							// 	} elseif ($count**2 > $view) {
							// 		break;
							// 	}
							// }
							if ($cond){
								echo "<td style='background-color:$color;'>$view</td>";
							} else {
								echo "<td>$view</td>";
							}
						}
						
						elseif ($display=='catur') {
							if ($i%2==1) {
								if ($j%2==0){
									$cond=true;
								}
							} else {
								if ($j%2==1){
									$cond=true;
								}
							}

							if ($cond){
								echo "<td style='background-color:$color;'>$view</td>";
							} else {
								echo "<td>$view</td>";
							}
					}
						elseif ($display=='komposit') {
							for ($angka=2; $angka < $view ; $angka++) { 
								if ($view%$angka==0) {
									$cond=true;
									break;
								}
							}
							if ($cond){
								echo "<td style='background-color:$color;'>$view</td>";
							} else {
								echo "<td>$view</td>";
							}
					}
						elseif ($display=='diagonal') {
							if (($limit-$i+1)==$j){
								$cond=true;
							}
							if ($cond){
								echo "<td style='background-color:$color;'>$view</td>";
							} else {
								echo "<td>$view</td>";
							}
					}
						else {
							echo "<td>$view</td>";
						}
					}

				}
				echo "</tr>";
			}
		}
	
	echo "</table>";
}


if (isset($_POST['submit'])) {
	$tampilan=$_POST['tampilan'];
	$warna=$_POST['warna'];
	$batas=$_POST['batas'];
	atur($batas,$tampilan,$warna);
}



 ?>

