<?php 

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function wajib_isi($data) {
	return !empty($data);
}
function alfabet($data) {
	return preg_match("/^[a-zA-Z\s]+$/", $data);
}
function numerik($data) {
	return is_numeric($data);
}
function nip($data) {
	return preg_match("/^[0-9]{10}$/", $data);
}
function kp($data) {
	return preg_match("/^[A-Z]{2}-[0-9]{5}$/", $data);
}
function alamat($data) {
	return preg_match("/^[a-zA-Z0-9\s\.\,]+$/", $data);
}

?>