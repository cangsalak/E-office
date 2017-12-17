<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');


$userId = mysqli_real_escape_string($link,$_POST['userId']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$password = mysqli_real_escape_string($link,$_POST['password']);
$userName = mysqli_real_escape_string($link,$_POST['userName']);
$positionId = $_POST['positionId'];

if($positionId == 2){
	$categoryId = 2;
}else if($positionId <= 14){
	$categoryId = 3;
}else if($positionId <= 32){
	$categoryId = 4;
}else if($positionId >= 33){
	$categoryId = 5;
}


$query = "INSERT INTO the_user (userId,email,password,userName,categoryId,positionId) VALUES ('$userId','$email','$password','$userName','$categoryId','$positionId')";


$result = mysqli_query($link,$query);


 if($result){
 	 header("Location: admin/members.php");

 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>