<?php

$link = mysqli_connect("localhost", "root", "foremost7", "e_office") or die(mysqli_connect_error());
mysqli_query($link,"SET NAMES UTF8");

	date_default_timezone_set('Asia/Bangkok');
	$months=array(  "0"=>"", "1"=>"มกราคม", "2"=>"กุมภาพันธ์", "3"=>"มีนาคม", "4"=>"เมษายน", "5"=>"พฤษภาคม", "6"=>"มิถุนายน", "7"=>"กรกฎาคม", "8"=>"สิงหาคม", "9"=>"กันยายน", "10"=>"ตุลาคม",  "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"    
		);  
	$date = date('j');
	$m = date('n');
	$month = $months[$m];
	$year = date('Y') +543;

	;

?>