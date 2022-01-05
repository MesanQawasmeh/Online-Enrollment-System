<?php
session_start();
session_unset();
session_destroy();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
header("Location:login-user.php");
exit();
?>

