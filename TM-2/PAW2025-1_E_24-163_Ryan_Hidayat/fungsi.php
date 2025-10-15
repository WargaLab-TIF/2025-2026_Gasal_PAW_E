<?php 
	function required($data) {
		return empty($data);
	}

	function alfabet($data) {
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function alfabet_batas($data){
		return preg_match("/^[a-zA-Z\s]{3,}$/", $data);
	}

	function numerik_telepon($data) {
		return preg_match("/^(08|628|\+628)[0-9]{9,10}$/", $data);
	}

	function numerik($data) {
		return preg_match("/^[0-9]+$/", $data);
	}

	function nik_batas($data) {
		return preg_match("/^[0-9]{16}$/", $data);
	}

	function numerik_harga($data) {
		return preg_match("/^[0-9]{7,}$/", $data);
	}

	function alfanumerik($data) {
		return preg_match("/^[a-zA-Z0-9]{8}$/", $data);
	}

	function is_alamat($data){
		return preg_match("/^[a-zA-Z\s.,]+$/", $data);
	}
?>