<?php

$link = mysqli_connect("localhost", "root", "foremost7", "e_office") or die(mysqli_connect_error());
mysqli_query($link,"SET NAMES UTF8");

$linkO = mysqli_connect("localhost", "root", "foremost7", "old_work") or die(mysqli_connect_error());
mysqli_query($linkO,"SET NAMES UTF8");


	date_default_timezone_set('Asia/Bangkok');
	$months=array(  "0"=>"", "01"=>"มกราคม", "02"=>"กุมภาพันธ์", "03"=>"มีนาคม", "04"=>"เมษายน", "05"=>"พฤษภาคม", "06"=>"มิถุนายน", "07"=>"กรกฎาคม", "08"=>"สิงหาคม", "09"=>"กันยายน", "10"=>"ตุลาคม",  "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"    
		);  
	$date = date('j');
	$m = date('m');
	$month = $months[$m];
	$year = date('Y')+543;

	;

?>