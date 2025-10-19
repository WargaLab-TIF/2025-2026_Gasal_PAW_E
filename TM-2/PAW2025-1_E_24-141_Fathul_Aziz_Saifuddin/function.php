<?php 

function kosong($data) {
	return empty($data);
}

function alfabet($data){
	return preg_match("/^[a-zA-Z ]+$/", $data);
}

function numeric($data){
	return preg_match("/^[0-9]+$/",$data);
}

function alfanumeric($data){
	return preg_match("/^[a-zA-Z0-9]+$/",$data);
}

function panjang($data,$jumlah){
	return preg_match("/^.{{$jumlah}}$/",$data);
}


?>