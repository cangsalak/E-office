<?php
session_start();
unset($_SESSION['ses_id']);
unset($_SESSION['email']);
unset($_SESSION['status']);
session_destroy();
header("Location: login.php");
        die();
?>
