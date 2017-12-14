<?php
include "connect.php";
			
$id = $_GET['id'];


$sql = "SELECT * FROM document WHERE documentId = '$id'";
$rs = mysqli_query($link,$sql);
$data = mysqli_fetch_array($rs,MYSQLI_ASSOC);

$type = "save_file";
$src = "{$type}/{$data['attachment']}";

header("Content-Type:application/download");
header("Content-Disposition:attachment;filename=$src");
header("Content-Transfer-Encoding:binary");

readfile("$src");	 

mysqli_close($link);
?>