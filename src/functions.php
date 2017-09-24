<?php
	function imagettftextCenter($im, $size, $angle, $x, $y, $color, $fontfile, $text)
	{
		$bbox = imagettfbbox($size, $angle, $fontfile, $text);
		$dx = ($bbox[2]-$bbox[0])/2.0 - ($bbox[2]-$bbox[4])/2.0;
		$dy = ($bbox[3]-$bbox[1])/2.0 + ($bbox[7]-$bbox[1])/2.0;
		$px = $x-$dx;
		$py = $y-$dy;
			
		return imagettftext($im, $size, $angle, $px, $py, $color, $fontfile, $text);
	}
	
	function curl($link)
	{
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$link);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3);
			$query = curl_exec($ch);
			curl_close($ch);
			
			return $query;
	}