<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');


$userId = mysqli_real_escape_string($link,$_POST['userId']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$password = mysqli_real_escape_string($link,$_POST['password']);
$userName = mysqli_real_escape_string($link,$_POST['userName']);
$positionId = $_POST['positionId'];
$positionId2 = $_POST['positionId2'];
$positionId3 = $_POST['positionId3'];

if(($positionId<$positionId2) || ($positionId<$positionId3) ){
	if($positionId2>$positionId3){
		if($positionId2 == 2){
			$categoryId2 = 2;
		}else if($positionId2 <= 14){
			$categoryId2 = 3;
		}else if($positionId2 <= 32){
			$categoryId2 = 4;
		}else if($positionId2 >= 33){
			$categoryId2 = 5;
		}
	}
	else{
		if($positionId3 == 2){
			$categoryId3 = 2;
		}else if($positionId2 <= 14){
			$categoryId3 = 3;
		}else if($positionId3 <= 32){
			$categoryId3 = 4;
		}else if($positionId3 >= 33){
			$categoryId3 = 5;
		}
	}

		
}
else if(($positionId>$positionId2) || ($positionId>$positionId3) ){
	if($positionId == 2){
		$categoryId = 2;
	}else if($positionId <= 14){
		$categoryId = 3;
	}else if($positionId <= 32){
		$categoryId = 4;
	}else if($positionId >= 33){
		$categoryId = 5;
	}
}




$query = "INSERT INTO the_user (userId,email,password,userName,categoryId,positionId,positionId2,positionId3) VALUES ('$userId','$email','$password','$userName','$categoryId','$positionId','$positionId2','$positionId3')";


$result = mysqli_query($link,$query);


 if($result){
 	 header("Location: admin/members.php");

 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>