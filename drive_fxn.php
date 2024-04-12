<?php
include "../actions/get_all_drives_action.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<?php

function displayDrivesTable($UserID) {
    $drives = getAllDrives();
  
 
    echo "<div class='drives-table-container'>
            <table class='drives-table'>
              <thead>";
    
    if ($UserID == 1) {
        echo "<tr>
                <th>Drive Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
              </tr>";
    } else {
        echo "<tr>
                <th>Drive Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
              </tr>";
    }
    
    echo "</thead>
          <tbody>";
    if ($drives) {
        foreach ($drives as $drive) {
            echo "<tr>";
            echo "<td>{$drive['CampaignName']}</td>";
            echo "<td>{$drive['Location']}</td>";
            echo "<td>{$drive['Date']}</td>";
            echo "<td>{$drive['StartTime']}</td>";
            echo "<td>{$drive['EndTime']}</td>";
            echo "<td>";
            if ($UserID == 1) {
                
                    echo "<a class='edit-btn' onclick=\"openEditModal({$drive['CampaignID']}, '{$drive['CampaignName']}')\" href=\"#\"><i class='material-symbols-outlined'>Edit</i></a>";
                    echo "<a class='delete-btn' href='../actions/delete_drive_action.php?CampaignID={$drive['CampaignID']}' onclick=\"return confirm('Are you sure you want to delete this drive?')\"><button><i class='material-symbols-outlined'>delete</i></button></a>";
                
            }
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No drives found</td></tr>";
    }
  
    echo "</tbody>
        </table>
      </div>";
  
  }
?>
