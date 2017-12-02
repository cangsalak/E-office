<?php


session_start();
include "connect.php";
//variable
$email = $_POST['email'];
$password = $_POST['password'];


if($email == ''){
  echo "Check Email";
  
} else if($password == ''){
  echo "Check Password";

} else {
  //query from database
  // ตรงนี้ต้องใส่ string ครอบไว้ด้วย
  $sql = "SELECT * FROM the_user WHERE email = '$email' AND password = '$password'";

    // count result data
  $nam = mysqli_query($link, $sql);
  $count_row = mysqli_num_rows($nam);
  if($count_row == 0){
    header("Location: login.php");
        die();
  } else {
    while ($user = mysqli_fetch_array($nam)) {
       
          //admin case
     
       if($user['categoryId'] == 1 )
      {
        $_SESSION['ses_Id'] = $user['categoryId'];
         $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['status'] = 1;
            //send to admin page
        header("Location: admin/index.php");
        die();
      } else if($user['categoryId'] == 2){

        $_SESSION['ses_Id'] = $user['categoryId'];
        $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        
        $_SESSION['status'] = 2;
            //send to user page
        header("Location: user/index.php");
        die();
      } else if($user['categoryId'] == 3){

        $_SESSION['ses_Id'] = $user['categoryId'];
        $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        $_SESSION['status'] = 3;
            //send to user page
        header("Location: user3/index.php");
        die();
      } else if($user['categoryId'] == 4){

         $_SESSION['ses_Id'] = $user['categoryId'];
         $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        $_SESSION['status'] = 4;
            //send to user page
        header("Location: user4/index.php");
        die();
      } else if($user['categoryId'] == 5){

         $_SESSION['ses_Id'] = $user['categoryId'];
         $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        $_SESSION['status'] = 5;
            //send to user page
        header("Location: user5/index.php");
        die();
      } else if($user['categoryId'] == 6){

         $_SESSION['ses_Id'] = $user['categoryId'];
         $_SESSION['ses_userId'] = $user['userId'];
        $_SESSION['ses_Name'] = $user['userName'];  
        $_SESSION['email'] = $user['email'];
        $_SESSION['ses_position'] = $user['positionId'];
        $_SESSION['status'] = 6;
            //send to user page
        header("Location: user6/index.php");
        die();
      }
        else {
            //send to boss page
        header("Location: logout.php");
        die();
      }
        }//end while
    }//end else

  }
  ?>
