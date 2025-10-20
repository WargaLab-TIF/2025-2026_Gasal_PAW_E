<?php 
	function wajib_isi($data){
		return !empty($data);
	}

	function alfabet($data){
		return preg_match("/^[a-zA-Z .,]+$/", $data);
	}

	function numeric($data){
		return preg_match("/^[0-9]+$/", $data);
	}

	function alfanumeric($data){
		return preg_match("/^[a-zA-Z0-9 .,]{3,}+$/", $data);
	}

	function istelp($data){
		return preg_match("/^(08||62)[0-9]{10,11}$/", $data);
	}

	function isemail($data){
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	function isalamat($data){
		return preg_match("/^[a-zA-Z0-9., ]+$/", $data);
	}

 ?>