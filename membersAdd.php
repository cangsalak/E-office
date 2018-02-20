<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');


$userId = mysqli_real_escape_string($link,$_POST['userId']);
$Semail = mysqli_real_escape_string($link,$_POST['email']);
$Temail = "@stu.eau.ac.th";
$email = $Semail.$Temail;
$password = mysqli_real_escape_string($link,$_POST['password']);
$userName = mysqli_real_escape_string($link,$_POST['userName']);
$positionId = $_POST['positionId'];
$positionId2 = $_POST['positionId2'];
$positionId3 = $_POST['positionId3'];
$positionId4 = $_POST['positionId4'];
$positionId5 = $_POST['positionId5'];
$min  = $positionId;
if ($positionId2 < $min) { 
	$min = $positionId2; 
}
if ($positionId3 < $min) { 
	$min = $positionId3; 
}
if ($positionId4 < $min) { 
	$min = $positionId4; 
}
if ($positionId5 < $min) { 
	$min = $positionId5; 
}
if($min == 2){
	$categoryId = 2;
}else if($min <= 14){
	$categoryId = 3;
}else if($min <= 32){
	$categoryId = 4;
}else if($min >= 33){
	$categoryId = 5;
}	


//การเข้ารหัส
$salt='sdfmjkls08@$%gvbcdasdasdfnmyshsdasd';
$encryption=hash_hmac('sha256',$password, $salt);



$query = "INSERT INTO the_user (userId,email,password,userName,categoryId,positionId,positionId2,positionId3,positionId4,positionId5,operation_the_user) VALUES ('$userId','$email','$encryption','$userName','$categoryId','$positionId','$positionId2','$positionId3','$positionId4','$positionId5',NOW())";


$result = mysqli_query($link,$query);


if($result){
	header("Location: admin/members.php");

}else{
	echo "ผิดพลาด".mysqli_errno($link);

}

mysqli_close($link);




?>