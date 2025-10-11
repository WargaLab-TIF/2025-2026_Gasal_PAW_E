	<?php 

	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function wajib_isi($data){
		return empty($data);
	}

	function alfabet($data){
		return preg_match("/^[a-zA-Z\s]+$/", $data);
	}

	function numeric($data){
		return is_numeric($data);
	}

	function email($data){
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	//alfanumeric
	function alamat($data){
		return preg_match("/^[a-zA-Z0-9\s,.\-\/]{5,30}$/", $data);

	}

	//panjang digit
	function panjang_digit($data){
		return preg_match("/^[0-9\s]{0,16}+$/", $data);
	}
	?>
