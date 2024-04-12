<?php

include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $campaignName = $_POST['driveName'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];


    $sql = "INSERT INTO Campaigns (CampaignName, Location, Date, StartTime, EndTime) 
            VALUES ('$campaignName', '$location', '$date', '$startTime', '$endTime')";

 
    $queryResult = $conn->query($sql);
    
   
    if ($queryResult) {
       
        header('Location: ../admin/admin_dash.php');
        exit();
    } else {
        
        echo "Error adding campaign to the database.";
    }
} else {
    
    header('Location: ../admin/admin_dash.php');
    exit();
}

?>
