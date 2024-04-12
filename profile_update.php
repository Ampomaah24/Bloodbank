<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!isset($_SESSION['UserID'])) {
    
    header("Location:../users/login.php");
    exit();
}


include "../settings/connection.php";

$UserID = $_SESSION['UserID'];
$query = "SELECT FirstName, LastName, Email, PhoneNumber FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();
} else {
    
    header("Location:../users/login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $newEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $newFirstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $newLastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $newPhoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    
 
    $query = "UPDATE Users SET Email = ?, FirstName = ?, LastName = ?, PhoneNumber = ? WHERE UserID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $newEmail, $newFirstName, $newLastName, $newPhoneNumber, $UserID);
    
    if ($stmt->execute()) {
        
        header("Location: profile.php?success=1");
        exit();
    } else {
    
        header("Location: profile.php?error=1");
        exit();
    }
}
?>