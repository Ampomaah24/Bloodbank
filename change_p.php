<?php
// session_start();
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// include "../settings/connection.php";


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
//     $oldPassword = mysqli_real_escape_string($conn, $_POST['oldPassword']);
//     $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
//     $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);


//     $userID = $_SESSION['UserID'];

//     if ($newPassword != $confirmPassword) {
//         $_SESSION['change_password_error'] = "New password and confirm password do not match.";
//         header("Location: ../actions/change_p.php");
//         exit();
//     }


//     $sql = "SELECT Password FROM Users WHERE UserID = '$userID'";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         $row = mysqli_fetch_assoc($result);
//         if (password_verify($oldPassword, $row['Password'])) {

//             $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

//             $updateSql = "UPDATE Users SET Password = '$hashedPassword' WHERE UserID = '$userID'";
//             $updateResult = mysqli_query($conn, $updateSql);

//             if ($updateResult) {
//                 $_SESSION['change_password_success'] = "Password changed successfully.";
//                 header("Location: ../Profile/profile.php");
//                 exit();
//             } else {
//                 $_SESSION['change_password_error'] = "Failed to update password. Please try again later.";
//                 header("Location: ../Profile/profile.php");
//                 exit();
//             }
//         } else {
//             $_SESSION['change_password_error'] = "Incorrect old password.";
//             header("Location: ../Profile/profile.php");
//             exit();
//         }
//     } else {
//         $_SESSION['change_password_error'] = "Query failed: " . mysqli_error($conn);
//         header("Location: ../Profile/profile.php");
//         exit();
//     }
// } else {
//     $_SESSION['change_password_error'] = "Invalid request";
//     header("Location: ../Profile/profile.php");
//     exit();
// }
?>
