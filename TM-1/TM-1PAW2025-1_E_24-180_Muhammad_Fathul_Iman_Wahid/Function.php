<?php
function cetaktabel($batas,$aturan,$warna){

$html = "<table class='tabel-penjumlahan'>"; 
$html .= "<thead><tr><th></th>";

for ($col = 1; $col <= $batas; $col++) {
    $html .= "<th>$col</th>"; 
    
} 

$html .= "</tr></thead><tbody>";

for ($row = 1; $row <= $batas; $row++) {
    $html .= "<tr><th> $row </th>";
    
    for ($col = 1; $col <= $batas; $col++) {
    	$hasil = $row % $col; 
        $classFilter = ''; 

        switch ($aturan) {
                case 'kubik': 
                    $akar = round(pow($hasil, 1/3));
                    if (($akar ** 3 == $hasil) && $hasil > 0) {
                        $classFilter = 'kubik-filter';
                    }
                    break;
                case 'perbatasan':
                    if ($row == 1 || $col == 1 || $row == $batas || $col == $batas) {
                        $classFilter = 'perbatasan-filter';
                    }
                    break;
                case 'prima':
                    if (prima($hasil)) {
                        $classFilter = 'prima-filter';
                    }
                    break;
                case 'diagonal': 
                    if ($row == $col) {
                        $classFilter = 'diagonal-filter';
                    }
                    break;
            }
            if ($classFilter != '') {
                $finalClass = $classFilter . ' ' . $warna;
            } else {
                $finalClass = '';
}

        $html .= "<td class=\"$finalClass\">$hasil</td>"; 
    }

    $html .= "</tr>";
}

$html .= "</tbody></table>";
return $html;
} 

function prima($angka) {
    if ($angka < 2) {
        return false;
    }

    for ($i = 2; $i < $angka; $i++) {
        if ($angka % $i == 0) {
            return false;
        }
    }

    return true;
}

?>