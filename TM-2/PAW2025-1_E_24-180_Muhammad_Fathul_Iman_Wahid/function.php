<?php
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	
	return $data;
}

function wajib_isi($data){
	return !empty($data);
}

function alfabet($data){
	return preg_match('/^[a-zA-Z\s]+$/', $data);
}

function numerik($data){
	return preg_match('/^[0-9]+$/', $data);
}

function alfanumerik($data){
	return preg_match('/^[a-zA-Z0-9]+$/',$data);
}
?>