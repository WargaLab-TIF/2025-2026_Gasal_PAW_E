<?php

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function wajib_isi($data){
	return !empty($data);
}
function alphabet($data){
	return preg_match("/^[a-zA-Z\s]+$/", $data);
}
function alfanumerik($data){
	return preg_match("/^[a-zA-Z0-9\s]{6,}$/", $data);
}
function numerik($data){
	return preg_match("/^[0-9]{14,14}$/",$data);
}

function desimal($data){
	return ctype_digit($data);
}

function luas($data){
	return is_numeric($data);
}

?>