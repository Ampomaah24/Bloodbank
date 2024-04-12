<?php

include "../settings/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $CampaignID = $_POST['CampaignID'];
    $CampaignName = $_POST['CampaignName'];

    $query = "UPDATE Campaigns SET CampaignName = '$CampaignName' WHERE CampaignID = '$CampaignID'";
  
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: ../admin/admin_dash.php");
        exit();
    } else {
  
        die("Error: " . mysqli_error($conn));
    }

} else {
    header("Location: ../admin/admin_dash.php");
    exit();
}
?>
