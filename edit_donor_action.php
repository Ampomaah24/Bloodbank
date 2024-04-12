<?php

include "../settings/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $DonorID = $_POST['DonorID'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['Gender'];
    $bloodGroup = $_POST['BloodGroup'];
    $contactNumber = $_POST['ContactNumber'];
    $medicalHistory = $_POST['MedicalHistory'];

    $query = "UPDATE Donors SET 
              FirstName = '$firstName', 
              LastName = '$lastName', 
              DateOfBirth = '$dob', 
              Gender = '$gender', 
              BloodGroup = '$bloodGroup', 
              ContactNumber = '$contactNumber', 
              MedicalHistory = '$medicalHistory' 
              WHERE DonorID = '$DonorID'";
 
    $result = mysqli_query($conn, $query);
    if($result) {
        header("Location: ../admin/d_register_mgt.php");
        exit();
  
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    header("Location: ../admin/d_register_mgt.php");
    exit();

}
?>
