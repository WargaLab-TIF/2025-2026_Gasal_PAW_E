<?php 
	function wajib_isi($data){
		return !empty($data);
	}

	function alfabet($data){
		return preg_match("/^[a-zA-Z ]+$/", $data);
	}

	function numeric($data){
		return is_numeric($data);
	}

	function isjudul($data){
		return preg_match("/^[a-zA-Z .,]+$/", $data);
	}

	function isemail($data){
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	function isalamat($data){
		return preg_match("/^[a-zA-Z0-9., ]+$/", $data);
	}

 ?>