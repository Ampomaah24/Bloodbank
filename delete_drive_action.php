<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "../settings/connection.php";


if(isset($_GET['CampaignID']) && !empty($_GET['CampaignID'])){

  $CampaignID = $_GET['CampaignID'];

  $d_query = "DELETE FROM Campaigns WHERE CampaignID = '$CampaignID'";

  echo "Debug: SQL query: $d_query<br>";

  $run = mysqli_query($conn, $d_query);  

  if ($run) {  
    header("Location:../admin/admin_dash.php");  
  } else {  
    echo "Error: " . mysqli_error($conn);  
  }  
} else {
  echo "Error: CampaignID not provided or invalid.";
}  
?>
