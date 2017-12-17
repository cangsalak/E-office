<?php


include "connect.php";

$categoryId = $_GET['categoryId'];
$category=$categoryId;
$userId = $_POST['userId'];
$email = $_POST['email'];
$password = $_POST['password'];
$userName = $_POST['userName'];
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


$up = " UPDATE the_user SET email='$email', password='$password', userName='$userName', categoryId='$categoryId', positionId='$positionId' WHERE userId = '$userId' ";

$result = mysqli_query($link,$up);

if($result){
		if($category == 1){
		header("Location: admin/members.php");
		}
		else if($categoryId == 2){
 		header("Location: user/private.php?userId=".$userId);
 		}
 		else if($categoryId == 3){
 		header("Location: user3/private.php?userId=".$userId);
 		}
 		else if($categoryId == 4){
 		header("Location: user4/private.php?userId=".$userId);
 		}
 		else if($categoryId == 5){
 		header("Location: user5/private.php?userId=".$userId);
 		}
 		else if($categoryId == 6){
 		header("Location: user6/private.php?userId=".$userId);
 		}


}else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }
 	mysqli_close($link);
?>