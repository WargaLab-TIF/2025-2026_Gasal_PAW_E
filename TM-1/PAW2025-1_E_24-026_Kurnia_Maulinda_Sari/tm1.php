<?php
function cekKubikSempurna($angka) {
    $angka = intval($angka);
    if ($angka < 0) return false;
    if ($angka === 0 || $angka === 1) return true;
    
    $akar = round($angka ** (1/3));
    return ($akar * $akar * $akar) == $angka;
}

function cekBilanganPrima($angka) {
    $angka = intval($angka);
    if ($angka < 2) return false;
    if ($angka == 2) return true;
    if ($angka % 2 == 0) return false;
    
    $batas = floor(sqrt($angka));
    for ($i = 3; $i <= $batas; $i += 2) {
        if ($angka % $i == 0) return false;
    }
    return true;
}

function prosesKondisiSel($data_sel) {
    $nilai = $data_sel['nilai'];
    $baris = $data_sel['baris'];
    $kolom = $data_sel['kolom'];
    $max_baris = $data_sel['max_baris'];
    $max_kolom = $data_sel['max_kolom'];
    $warna = $data_sel['warna'];
    $filter = $data_sel['filter'];
    
    if (empty($warna)) return '';
    
    $kondisi = array(
        'kubik' => cekKubikSempurna($nilai),
        'prima' => cekBilanganPrima($nilai),
        'diagonal' => ($baris == $kolom),
        'perbatasan' => ($baris == 1 || $baris == $max_baris || $kolom == 1 || $kolom == $max_kolom)
    );
    
    if (isset($kondisi[$filter]) && $kondisi[$filter]) {
        return "sel-terfilter $warna";
    }
    
    return '';
}

function buatHeaderUntukTabel($ukuran) {
    $html_header = "<thead><tr><th class='kepala-kosong'>Baris/Kolom</th>";
    for ($k = 1; $k <= $ukuran; $k++) {
        $html_header .= "<th class='kepala-kolom'>$k</th>";
    }
    $html_header .= "</tr></thead>";
    return $html_header;
}

function buatBarisTabel($ukuran, $warna, $filter) {
    $html_baris = "";
    for ($b = 1; $b <= $ukuran; $b++) {
        $html_baris .= "<tr>";
        $html_baris .= "<th class='kepala-baris'>$b</th>";
        
        for ($k = 1; $k <= $ukuran; $k++) {
            $nilai = $b % $k;
            $data_sel = array(
                'nilai' => $nilai,
                'baris' => $b,
                'kolom' => $k,
                'max_baris' => $ukuran,
                'max_kolom' => $ukuran,
                'warna' => $warna,
                'filter' => $filter
            );
            
            $kelas = prosesKondisiSel($data_sel);
            $html_baris .= "<td class='$kelas'>$nilai</td>";
        }
        $html_baris .= "</tr>";
    }
    return $html_baris;
}

function generateTabelModulus($parameter) {
    $ukuran = intval($parameter['ukuran']);
    $warna = $parameter['warna'];
    $nama_warna = $parameter['nama_warna'];
    $filter = $parameter['filter'];
    $nama_filter = $parameter['nama_filter'];
    
    $html = "<div class='wrapper-tabel'>";
    $html .= "<h2 class='heading-tabel'>";
    $html .= "Tabel Modulus {$ukuran}×{$ukuran}";
    $html .= "<br><span class='sub-heading'>Filter: {$nama_filter} | Warna: {$nama_warna}</span>";
    $html .= "</h2>";
    
    $html .= "<div class='tabel-container'>";
    $html .= "<table class='modulus-table'>";
    $html .= buatHeaderUntukTabel($ukuran);
    $html .= "<tbody>" . buatBarisTabel($ukuran, $warna, $filter) . "</tbody>";
    $html .= "</table>";
    $html .= "</div></div>";
    
    return $html;
}
?>
