<?php


include "connect.php";

$categoryId = $_GET['categoryId'];
$category=$categoryId;
$userId = $_POST['userId'];
$Semail = $_POST['email'];
$Temail = "@stu.eau.ac.th";
$email = $Semail.$Temail;
$password = $_POST['password'];
$userName = $_POST['userName'];
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

	$salt='sdfmjkls08@$%gvbcdasdasdfnmyshsdasd';
	$encryption=hash_hmac('sha256',$password, $salt);

if(!empty($password)&&!empty($email)){
	
		$up = " UPDATE the_user SET email='$email', password='$encryption', userName='$userName', categoryId='$categoryId', positionId='$positionId', positionId2='$positionId2', positionId3='$positionId3', positionId4='$positionId4', positionId5='$positionId5' ,operation_the_user=NOW()WHERE userId = '$userId' ";
$result = mysqli_query($link,$up);

}else{
		$up = " UPDATE the_user SET userName='$userName', categoryId='$categoryId', positionId='$positionId', positionId2='$positionId2', positionId3='$positionId3', positionId4='$positionId4', positionId5='$positionId5' ,operation_the_user=NOW() WHERE userId = '$userId' ";
$result = mysqli_query($link,$up);
}


//การเข้ารหัส

if($result){
	if($category == 1){
		header("Location: admin/members.php");
	}
	else if($categoryId > 1){
		header("Location: user/private.php?userId=".$userId);
	}


}else{
	echo "ผิดพลาด".mysqli_errno($link);

}
mysqli_close($link);
?>