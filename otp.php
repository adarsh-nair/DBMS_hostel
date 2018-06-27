<?php
	function otp($len)
	{
		$string =	 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789';
		$len = strlen($string);
		$otp = "";
		for($i = 0; $i < $len; $i = $i + 1)
		{
			$char = $string[rand() % $len];
			$otp = $otp."".$char;
		}
		return $otp;
	}
?>
