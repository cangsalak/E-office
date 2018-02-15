<?php
session_start();
unset($_SESSION['ses_Id']);
unset($_SESSION['ses_userId']);
unset($_SESSION['ses_Name']);
unset($_SESSION['email']);
unset($_SESSION['ses_position']);
unset($_SESSION['status']);
session_destroy();
header("Location: login.php");
        die();
?>
