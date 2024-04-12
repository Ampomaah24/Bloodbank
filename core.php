<?php

session_start();

function login_check() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/login_view.php");
        exit();
    }
}


login_check();

?>