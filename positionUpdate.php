<?php


include "connect.php";

$positionId = $_POST['positionId'];
$positionName = $_POST['positionName'];




$up = " UPDATE positionuser SET positionName='$positionName',operation_positionuser=NOW() WHERE positionId = '$positionId' ";

$result = mysqli_query($link,$up);

if($result){
	 header("Location: admin/position.php");
	}else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }
 	mysqli_close($link);
