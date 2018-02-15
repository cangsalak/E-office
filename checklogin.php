<?php


session_start();
include "connect.php";
//variable
$email = mysqli_real_escape_string($link,$_POST['email']);
$password = mysqli_real_escape_string($link,$_POST['password']);

if($email == ''){
  echo "Check Email";
  
} else if($password == ''){
  echo "Check Password";

} else {

  $salt='sdfmjkls08@$%gvbcdasdasdfnmyshsdasd';
  $encryption=hash_hmac('sha256',$password, $salt);
  
  //query from database
  // ตรงนี้ต้องใส่ string ครอบไว้ด้วย
  $sql = "SELECT * FROM the_user WHERE email = ? AND password = ?";
  $nam = mysqli_prepare($link,$sql);
  mysqli_stmt_bind_param($nam,"ss",$email,$encryption);
  mysqli_execute($nam);
  $namRow = mysqli_stmt_get_result($nam);

    // count result data
  
  $count_row = mysqli_num_rows($namRow);
  $user = mysqli_fetch_array($namRow);
  if($count_row == 0){
    header("Location: login.php");
        die();
  } else {
    
       
          //admin case
     
       if($user['categoryId'] == 1 )
      {
        $_SESSION['ses_Id'] = $user['categoryId'];
        $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['status'] = 'admin';
            //send to admin page
        header("Location: admin/index.php");
        die();
      } else if($user['categoryId'] > 1){

        $_SESSION['ses_Id'] = $user['categoryId'];
        $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        
        $_SESSION['status'] = 'user';
            //send to user page
        header("Location: user/index.php");
        die();
      }
        else {
            //send to boss page
        header("Location: logout.php");
        die();
      }
        
    }//end else

  }
  ?>
