<?php
include "../settings/connection.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
function getAllDrives() {
  global $conn;
  $query = "SELECT * FROM Campaigns";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  }

  if (mysqli_num_rows($result) > 0) {
      $drives = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $drives;
  } else {
      echo "No drives found"; 
  }
}




?>