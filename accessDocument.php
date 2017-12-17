<?php


include "connect.php";
date_default_timezone_set('Asia/Bangkok');
error_reporting(E_ALL & ~E_NOTICE);
$userId = $_GET['userId'];
$documentId = $_POST['documentId'];
$accessAaction = $_POST['accessAaction'];
$name=basename($_FILES['accessAttachment']['name']);

$ext = pathinfo($name,PATHINFO_EXTENSION); 
$new_image_name = 'image_'.uniqid().".".$ext; 
$image_path = "save_file/"; 
$upload_path = $image_path.$new_image_name; 
echo $upload_path;
//uploading
$success = move_uploaded_file($_FILES['accessAttachment']['tmp_name'],$upload_path);
$pro_attachment = $new_image_name;
$categoryId = $_POST['categoryId'];
$positionId = $_POST['positionId']; 

if(@$_POST["positionId"]){
	for($i=0;$i<sizeof($positionId);$i++){
					
			$sql = "INSERT INTO access (accessDate,accessAttachment,positionId,documentId,userId,accessAaction) 
			VALUES (curdate(),'$pro_attachment','$positionId[$i]','$documentId','$userId','$accessAaction')";
			
			$result = mysqli_query($link,$sql);

	}
 }else{
 	$sql = "INSERT INTO access (accessDate,accessAttachment,documentId,userId,accessAaction) 
       			VALUES (curdate(),'$pro_attachment','$documentId','$userId','$accessAaction')";
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