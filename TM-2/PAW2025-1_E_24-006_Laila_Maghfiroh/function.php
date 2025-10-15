<?php 
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	function wajib_isi($data){
		return !empty($data);
	}

	function alfabet($data){
		return preg_match("/^[a-zA-Z ]+$/", $data);
	}

	function numerik($data){
		return is_numeric($data);
	}

	function alfanumerik($data){
		return preg_match("/^[A-Za-z0-9\s.,\-\/#()]+$/", $data);
	}

	function panjang_digit($data, $min, $max = null){
	    if (!numerik($data)) {
	        return false;
	    }

	    $panjang = strlen((string)$data);

	    if ($max === null) {
	        if ($panjang === $min) {
	            return true;
	        } else {
	            return false;
	        }
	    }

	    if ($panjang >= $min && $panjang <= $max) {
	        return true;
	    } else {
	        return false;
	    }
	}


	function panjang_karakter($data, $min, $max = null){
	    $len = mb_strlen($data);
	    if ($max === null) {
	        return $len >= $min;
	    }
	    return $len >= $min && $len <= $max;
	}

	function email($data){
		return filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	function telp($s){
	  $s = preg_replace('/\D+/', '', $s);
	  return preg_match('/^(?:62|0)8\d{10,12}$/', $s) === 1;
	}


?>