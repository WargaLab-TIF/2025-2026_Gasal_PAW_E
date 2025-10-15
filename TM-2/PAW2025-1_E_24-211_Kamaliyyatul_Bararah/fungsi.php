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
	return preg_match("/^[a-zA-Z\s]*$/", $data);
}

function numerik($data){
	return is_numeric($data);
}

function valKtp($data){
	return preg_match("/^[0-9]{16}$/", $data);
}

function valAlamat($data){
	return preg_match("/^[a-zA-Z0-9\s,.-\/]{2,50}$/", $data);
}

function valTelpon($data) {
	return preg_match("/^[0-9]{10,13}$/",$data);
}

function valSertif($data){
	return preg_match("/^[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]\.[0-9]{5}$/", $data); 
}
 ?>

