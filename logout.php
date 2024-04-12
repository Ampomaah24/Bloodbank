<?php
session_start();
unset($_SESSION['email']);
header("Location:../view/login.php");
exit();

?>