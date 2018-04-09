<?php

// test commit
include "connect.php";
date_default_timezone_set('Asia/Bangkok');
error_reporting(E_ALL & ~E_NOTICE);
$userId = $_GET['userId'];
$documentId = $_POST['documentId'];
if($_POST['accessAaction']){
	$accessAaction = $_POST['accessAaction'];
}else{
	$accessAaction = $_POST['Other'];
}

$name=basename($_FILES['accessAttachment']['name']);
$ext = pathinfo($name,PATHINFO_EXTENSION); 
$new_image_name = 'user'.$Time."_".$Encrypt.".".$ext; 
$image_path = "save_file/user/".$year."/additional/"; 
$upload_path = $image_path.$new_image_name; 
//uploading
$success = move_uploaded_file($_FILES['accessAttachment']['tmp_name'],$upload_path);
if ($success==FALSE) { 
  # code...
 $pro_attachment = "";   
}else{
	$pro_attachment = $new_image_name;
}

$up = " UPDATE access SET status='Solve',operation_access=NOW() WHERE documentId = '$documentId' ";

$result = mysqli_query($link,$up);


$categoryId = $_POST['categoryId'];
$positionId = $_POST['positionId']; 
$attached = $_POST['attached']; 
$status = 'New';

if(@$_POST["positionId"]){
	for($i=0;$i<sizeof($positionId);$i++){
					
			$sql = "INSERT INTO access (accessDate,accessAttachment,positionId,documentId,userId,accessAaction,attached,status,operation_access) 
			VALUES ('$Time','$pro_attachment','$positionId[$i]','$documentId','$userId','$accessAaction','$attached','$status',NOW())";
			
			$result = mysqli_query($link,$sql);

	}
 }else{
 	header("Location: user/Document.php");
	
 }	
 



 if($result){
 	if($categoryId > 1){
 		header("Location: user/index.php?userId=".$userId);
 		}
 		else{
 			header("Location: admin/index.php");
 		}
 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>