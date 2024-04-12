<?php
$dbserver_name = "localhost";
$dbuser_name = "root";
$dbpassword = "";
$dbName ="BB";   


$conn = new mysqli($dbserver_name, $dbuser_name, $dbpassword, $dbName);
if ($conn->connect_error) {
    
  die("Connection failed: " . $conn->connect_error);
} 



?>