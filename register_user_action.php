<?php
include "../settings/connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign-sub'])) {

  $pass_wd = $_POST['pass_wd'];
  $fname = $_POST['FirstName']; 
  $lname = $_POST['LastName']; 
  $dob = $_POST['DateOfBirth']; 
  $gender = $_POST['Gender']; 
  $num = $_POST['ContactNumber']; 
  $mail = $_POST['Email']; 

  $P_hash = password_hash($pass_wd, PASSWORD_DEFAULT);

  $query = "INSERT INTO Users (Password, FirstName, LastName, DOB, Gender, PhoneNumber, Email)
              VALUES ('$P_hash', '$fname', '$lname', '$dob', '$gender', '$num', '$mail')";

  $result = mysqli_query($conn, $query);

  if($result){
    header("Location: ../view/login.php");
    exit();
  } else {
    die("Error: " . mysqli_error($conn));
  }
}
?>
