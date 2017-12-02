<?php


include "connect.php";

date_default_timezone_set('Asia/Bangkok');

error_reporting(E_ALL & ~E_NOTICE);
if(empty($_POST['documentName'])){
 	echo "กรุณากรอกชื่อเรื่อง";
 	exit();
}else{
	$documentName = mysqli_real_escape_string($link,$_POST['documentName']);
}

$fromName = mysqli_real_escape_string($link,$_POST['fromName']);
$statusName = mysqli_real_escape_string($link,$_POST['statusName']);
$documentDate =mysqli_real_escape_string($link,$_POST['documentDate']);

$ext = pathinfo(basename($_FILES['attachment']['name']), PATHINFO_EXTENSION); 
$new_image_name = 'image_'.uniqid().".".$ext; 
$image_path = "save_file/"; 
$upload_path = $image_path.$new_image_name; 

//uploading
$success = move_uploaded_file($_FILES['attachment']['tmp_name'],$upload_path);
if ($success==FALSE) { 
  # code...
  echo "Fail up load image"; 
  exit(); 
}
$pro_attachment = $new_image_name;

$categoryDocument = mysqli_real_escape_string($link,$_POST['categoryDocument']);
$action = mysqli_real_escape_string($link,$_POST['action']);
$story = mysqli_real_escape_string($link,$_POST['story']);
$Number_of_book = mysqli_real_escape_string($link,$_POST['Number_of_book']);
$positionId = $_POST['positionId'];

$sql = "INSERT INTO document (fromName,statusName,documentDate,documentTime,attachment,categoryDocument,documentName,action,story,Number_of_book,positionId) 
       VALUES ('$fromName','$statusName','$documentDate',curdate(),'$pro_attachment','$categoryDocument','$documentName','$action','$story ','$Number_of_book','$positionId')";

 $result = mysqli_query($link,$sql);

 if($result){
 	header("Location: admin/index.php");

 }else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }

 	mysqli_close($link);



 
 ?>