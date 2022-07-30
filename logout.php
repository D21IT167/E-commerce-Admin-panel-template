<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
$days = 30;
setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
header("location:login.php"); //to redirect back to "index.php" after logging out
exit();
?>