<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');

$userId = $_GET['userId'];
$documentId = $_POST['documentId'];
$accessAaction = $_POST['accessAaction'];
$accessAttachment = $_POST['accessAttachment'];
$categoryId = $_POST['categoryId'];


 if(@$_POST["positionId"]){
 	for($i=1;$i<=count($_POST["positionId"]);$i++){
			if(trim($_POST["positionId"][$i]) != ""){
				$positionId = $_POST['positionId'][$i];
				
				$sql = "INSERT INTO access (accessDate,accessAttachment,positionId,documentId,userId,accessAaction) 
       			VALUES (curdate(),'$accessAttachment','$positionId','$documentId','$userId','$accessAaction')";
				$result = mysqli_query($link,$sql);

			}
	}
 }else{
 	$sql = "INSERT INTO access (accessDate,accessAttachment,documentId,userId,accessAaction) 
       			VALUES (curdate(),'$accessAttachment','$documentId','$userId','$accessAaction')";
	$result = mysqli_query($link,$sql);
 }	
 



 if($result){
 	if($categoryId == 2){
 		header("Location: user/index.php?userId=".$userId);
 		}
 		else if($categoryId == 3){
 		header("Location: user3/index.php?userId=".$userId);
 		}
 		else if($categoryId == 4){
 		header("Location: user4/index.php?userId=".$userId);
 		}
 		else if($categoryId == 5){
 		header("Location: user5/index.php?userId=".$userId);
 		}
 		else if($categoryId == 6){
 		header("Location: user6/index.php?userId=".$userId);
 		}else{
 			header("Location: admin/index.php");
 		}
 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>