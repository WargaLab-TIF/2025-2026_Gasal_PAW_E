<?php 

function validasiInput ($data) {
	return !empty($data['namaPembeli']) && !empty($data['nikPembeli']) && !empty($data['alamatPembeli']) && !empty($data['telefonPembeli']) && 	 !empty($data['email']) && !empty($data['pekerjaan']) &&
		   !empty($data['namaPenjual']) && !empty($data['nikPenjual']) && !empty($data['telefonPenjual']) && 
		   !empty($data['noSertifikat']) && !empty($data['luas']) && !empty($data['harga']) && !empty($data['hakKepemilikan']) && !empty($data['lokasi']);
}

function validasiNama($nama) {
	return preg_match("/^[a-zA-Z]*$/", $nama);
}

function validasiNik($nik) {
	return preg_match("/^[0-9]{16}$/", $nik);
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

function validasiDropdown($data){
	if ($data == 'kosong') {
		return true;
	}
}
function validasiSertifikat($sertifikat){
	return preg_match("/^[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]\.[0-9]{5}$/", $sertifikat);
}
function validasiLuasDanHarga($data){
	return is_numeric($data);
}

?>

