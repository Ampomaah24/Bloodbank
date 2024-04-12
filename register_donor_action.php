<?php
include "../settings/connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['Gender'];
    $bgroup = $_POST['BloodGroup'];
    $num = $_POST['ContactNumber'];
    $medHist = $_POST['MedicalHistory'];

    $query = "INSERT INTO Donors (FirstName, LastName, DateOfBirth, Gender, BloodGroup, ContactNumber, MedicalHistory)
              VALUES ('$fname', '$lname', '$dob', '$gender', '$bgroup', '$num', '$medHist')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../users/Dashboard.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
