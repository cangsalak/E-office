<?php


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
$new_image_name = 'admin_'.$Time."_".$Encrypt.".".$ext; 
$image_path = "save_file/admin/additional/"; 
$upload_path = $image_path.$new_image_name; 
//uploading
$success = move_uploaded_file($_FILES['accessAttachment']['tmp_name'],$upload_path);
if ($success==FALSE) { 
  # code...
 $pro_attachment = "";   
}else{
	$pro_attachment = $new_image_name;
}

$status = 'New';
$positionId = $_POST['positionId']; 


$up = " UPDATE document SET status='Solve' WHERE documentId = '$documentId' ";

$result = mysqli_query($link,$up);

if(@$_POST["positionId"]){
	for($i=0;$i<sizeof($positionId);$i++){

		$sql = "INSERT INTO access (accessDate,accessAttachment,positionId,documentId,userId,accessAaction,status) 
		VALUES ('$Time','$pro_attachment','$positionId[$i]','$documentId','$userId','$accessAaction','$status')";

		$result = mysqli_query($link,$sql);

		
	}
}else{
	$sql = "INSERT INTO access (accessDate,accessAttachment,documentId,userId,accessAaction) 
	VALUES ('$Time','$pro_attachment','$documentId','$userId','$accessAaction')";
	$result = mysqli_query($link,$sql);
}	




if($result){

	header("Location: admin/index.php");
}else{
	echo "ผิดพลาด".mysqli_errno($link);

}

mysqli_close($link);




?>
 <?php // Make a MySQL Connection
 mysql_connect("localhost", "root", "") or die(mysql_error());
 mysql_select_db("test") or die(mysql_error());
 $checkBox = implode(',', $_POST['Days']); 
 if(isset($_POST['submit'])) { 
 	$query = "INSERT INTO example (orange) VALUES "; 
 	for ($i=0; $i<count($checkBox); $i++) 
 		$query .= "('" . $checkBox[$i] . "'),"; $query = rtrim($query,','); mysql_query($query) or die (mysql_error() ); 
 	echo "Complete"; 
 } ?> 

