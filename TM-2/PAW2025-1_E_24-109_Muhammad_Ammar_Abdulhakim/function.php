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

function alfanumerik($data) {
	return preg_match("/^[a-zA-Z0-9\s]+$/", $data);
}

function numerik($data) {
	return is_numeric($data);
}

function numerikbts($data) {
	return preg_match("/^[0-9]{4}$/", $data);
}

function alfanumerikbts($data) {
	return preg_match("/^[A-Z]{1,2}\s?[0-9]{1,4}\s?[A-Z]{0,3}$/i", $data);
}


 ?>