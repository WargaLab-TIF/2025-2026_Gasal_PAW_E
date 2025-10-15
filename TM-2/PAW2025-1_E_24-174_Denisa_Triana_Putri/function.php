<?php 

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function wajib ($data) {
	return !empty($data);

}
function alfabet ($data) {
	return preg_match("/^[a-zA-Z\s]+$/", $data);
}

function numerik ($data) {
	return is_numeric($data);
}

function email ($data) {
	return filter_var($data, FILTER_VALIDATE_EMAIL);
}

function alfanumerik ($data) {
	return preg_match("/^[A-Za-z0-9\s]+$/", $data);
}

function kode ($data) {
	return preg_match("/^[A-Za-z0-9]+$/", $data);
	
}

?>
