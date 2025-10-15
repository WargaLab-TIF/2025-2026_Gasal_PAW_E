<?php 

function inputan($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function wajibIsi($data){
	return !empty($data);
}

function alfabet($data){
	return preg_match("/^[a-zA-Z\s]+$/", $data);
}

function alfanumerik($data){
	return preg_match("/^[\w.\s-]+$/", $data);
}

function email($data){
	return filter_var($data, FILTER_VALIDATE_EMAIL);
}

function numerik($data){
	return is_numeric($data);
}

function minimal($data){
	return strlen($data) >= 3;

}

function minimalTelpon($data){
	return strlen($data) >= 10;

}
 ?>
