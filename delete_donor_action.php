<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../settings/connection.php";


if(isset($_GET['DonorID']) && !empty($_GET['DonorID'])){

  $DonorID = $_GET['DonorID'];

  $d_query = "DELETE FROM Donors WHERE DonorID = '$DonorID'";

  echo "Debug: SQL query: $d_query<br>";

  $run = mysqli_query($conn, $d_query);  

  if ($run) {  
    header("Location:../admin/d_register.php");  
  } else {  
    echo "Error: " . mysqli_error($conn);  
  }  
} else {
  echo "Error: CampaignID not provided or invalid.";
}  
?>
