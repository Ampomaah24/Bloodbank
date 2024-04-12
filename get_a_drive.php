<?php
include "../settings/connection.php";

function getId($CampaignID){
  global $conn;
  $query = "SELECT * FROM Campaigns WHERE CampaignID = '$CampaignID'";
  $result = mysqli_query($conn, $query);
    if ($result) {
       if (mysqli_num_rows($result) > 0) {
            $chore = mysqli_fetch_assoc($result);
            return $chore;
        } else {
            return null;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        return null;
    }
}

?>