<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
include "../settings/connection.php";


if (isset($_POST['login_b'])) {
    $email = $_POST['email'];
    $pass_wd = $_POST['pass_wd'];



    $sql = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row && password_verify($pass_wd, $row['Password'])) {
            $_SESSION['UserID'] = $row['UserID'];
                    
            if ($_SESSION['UserID'] == 1) {
                header("Location: ../admin/admin_dash.php");
                exit();
            } else {
                header("Location: ../view/Homepage.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Incorrect email or password"; 
            
            header("Location: ../view/login.php");
            exit();
        }
        
        
    } else {
        $_SESSION['login_error'] = "Query failed: " . mysqli_error($conn);
        header("Location: ../view/login.php");
        

        exit();
    }
} else {
    $_SESSION['login_error'] = "Invalid request";
    header("Location: ../view/login.php");
    

    exit();
}
?>
