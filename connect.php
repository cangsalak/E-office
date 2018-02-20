<?php

/* $link = mysqli_connect("mysql.hostinger.in.th", "u425917946_e0ff", "L2ojEJwep8rKwk3rBL", "u425917946_eoff") or die(mysqli_connect_error());
mysqli_query($link1,"SET NAMES UTF8"); */

$link = mysqli_connect("localhost", "root", "foremost7", "e_office") or die(mysqli_connect_error());
mysqli_query($link,"SET NAMES UTF8");


    $nameWeb="สำนักงานอัตโนมัติ";
	date_default_timezone_set('Asia/Bangkok');
	$months=array(  "0"=>"", "01"=>"มกราคม", "02"=>"กุมภาพันธ์", "03"=>"มีนาคม", "04"=>"เมษายน", "05"=>"พฤษภาคม", "06"=>"มิถุนายน", "07"=>"กรกฎาคม", "08"=>"สิงหาคม", "09"=>"กันยายน", "10"=>"ตุลาคม",  "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"    
		);  
	$date = date('j');
	$m = date('m');
	$month = $months[$m];
	$year = date('Y')+543;
	$yearMin=$year-1;
	$Time=$year."-".$m."-".$date;
	$TimeFine= date("H:i:s");
	$Encrypt=md5($TimeFine);
	

?>