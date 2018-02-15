<?php


include "connect.php";

$categoryId = $_GET['categoryId'];
$category=$categoryId;
$userId = $_POST['userId'];
$email = $_POST['email'];
$password = $_POST['password'];
$userName = $_POST['userName'];
$positionId = $_POST['positionId'];
$positionId2 = $_POST['positionId2'];
$positionId3 = $_POST['positionId3'];

if(!empty($positionId2)&&!empty($positionId3)){
		if(($positionId<$positionId2) && ($positionId<$positionId3) ){
			if($positionId == 2){
				$categoryId = 2;
			}else if($positionId <= 14){
				$categoryId = 3;
			}else if($positionId <= 32){
				$categoryId = 4;
			}else if($positionId >= 33){
				$categoryId = 5;
			}		
	}
	else if(($positionId>$positionId2) || ($positionId>$positionId3) ){
		if($positionId2<=$positionId3){
			if($positionId2 == 2){
			$categoryId = 2;
			}else if($positionId2 <= 14){
			$categoryId = 3;
			}else if($positionId2 <= 32){
			$categoryId = 4;
			}else if($positionId2 >= 33){
			$categoryId = 5;
			}
	}
		else{
			if($positionId3 == 2){
			$categoryId = 2;
			}else if($positionId3 <= 14){
			$categoryId = 3;
			}else if($positionId3 <= 32){
			$categoryId = 4;
			}else if($positionId3 >= 33){
			$categoryId = 5;
			}
		}
	
	}
}else if(!empty($positionId2)&&empty($positionId3)){
		if($positionId>$positionId2){
			if($positionId2 == 2){
			$categoryId = 2;
			}else if($positionId2 <= 14){
			$categoryId = 3;
			}else if($positionId2 <= 32){
			$categoryId = 4;
			}else if($positionId2 >= 33){
			$categoryId = 5;
			}
		}else{
			if($positionId == 2){
				$categoryId = 2;
			}else if($positionId <= 14){
				$categoryId = 3;
			}else if($positionId <= 32){
				$categoryId = 4;
			}else if($positionId >= 33){
				$categoryId = 5;
			}	
		}
		
}else{
		if($positionId == 2){
			$categoryId = 2;
		}else if($positionId <= 14){
			$categoryId = 3;
		}else if($positionId <= 32){
			$categoryId = 4;
		}else if($positionId >= 33){
			$categoryId = 5;
		}	
}

	$salt='sdfmjkls08@$%gvbcdasdasdfnmyshsdasd';
	$encryption=hash_hmac('sha256',$password, $salt);

if(!empty($password)){
	
		$up = " UPDATE the_user SET email='$email', password='$encryption', userName='$userName', categoryId='$categoryId', positionId='$positionId', positionId2='$positionId2', positionId3='$positionId3' WHERE userId = '$userId' ";
$result = mysqli_query($link,$up);

}else{
		$up = " UPDATE the_user SET email='$email', userName='$userName', categoryId='$categoryId', positionId='$positionId', positionId2='$positionId2', positionId3='$positionId3' WHERE userId = '$userId' ";
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