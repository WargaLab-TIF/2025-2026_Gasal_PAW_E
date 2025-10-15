<?php
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data =htmlspecialchars($data);
	return $data;
}
function wajib_isi($data) {
	return !empty($data);
}
function alfabet($data) {
	return preg_match("/^[a-zA-Z\s]+$/", $data);
}
function is_numerik($data) {
	return is_numeric($data);
}
function nik($data) {
	return is_numeric($data);
}
function email ($data) {
	return filter_var($data,FILTER_VALIDATE_EMAIL);
}
function alamat($data) {
	return preg_match ('/^[a-zA-Z0-9\s,.\/\-#&-]+$/u', $data);
}
?>
