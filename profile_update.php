<?php
// Start the session
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Check if user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to login page if not logged in
    header("Location:../users/login.php");
    exit();
}

// Include the database connection file
include "../settings/connection.php";

// Fetch user information from the database
$UserID = $_SESSION['UserID'];
$query = "SELECT FirstName, LastName, Email, PhoneNumber FROM Users WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $UserID);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();
} else {
    // Redirect to login page if user does not exist
    header("Location:../users/login.php");
    exit();
}

// Handle form submission for editing email, first name, last name, and phone number
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input fields
    $newEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $newFirstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $newLastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $newPhoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    
    // Update user's information in the database
    $query = "UPDATE Users SET Email = ?, FirstName = ?, LastName = ?, PhoneNumber = ? WHERE UserID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $newEmail, $newFirstName, $newLastName, $newPhoneNumber, $UserID);
    
    if ($stmt->execute()) {
        
        header("Location: profile.php?success=1");
        exit();
    } else {
        // Redirect to profile page with error message
        header("Location: profile.php?error=1");
        exit();
    }
}
?>