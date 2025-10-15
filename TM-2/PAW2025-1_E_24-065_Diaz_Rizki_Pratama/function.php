<?php 

function validasiNama($nama) {
	return preg_match("/^[a-zA-Z\s']*$/", $nama);
}

function validasiNik($nik) {
	return preg_match("/^[0-9]{1,16}$/", $nik);
}

function validasiAlamat($alamat) {
	return preg_match("/^[a-zA-Z0-9\s,.-\/]{2,50}$/", $alamat);
}

function validasiTelefon($telefon) {
	return preg_match("/^[0-9]{10,13}$/", $telefon);
}

function validasiEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validasiSertifikat($sertifikat){
	return preg_match("/^[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]\.[0-9]{5}$/", $sertifikat);
}
function validasiLuasDanHarga($data){
	return is_numeric($data);
}

?>

