<?php
	function encryptPass($str){
		$md5 = md5($str);
		$sha1 = sha1($md5);
		$crypt = crypt($sha1, st);

		return $crypt;
	}
?>