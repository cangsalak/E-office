<?php


include "connect.php";


$positionName = $_POST['positionName'];


$up = "INSERT INTO positionuser (positionName,operation_positionuser) VALUES ('$positionName',NOW())";

$result = mysqli_query($link,$up);

if($result){
	 header("Location: admin/position.php");
	}else{
 	echo "ผิดพลาด".mysqli_errno($link);

 }
 	mysqli_close($link);
