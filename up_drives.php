<?php
include "../settings/connection.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);

function getAllDrives($status) {
    global $conn;
    $today = date("Y-m-d");
    $operator = ($status == 'past') ? '<' : '>=';
    $query = "SELECT * FROM Campaigns WHERE Date $operator '$today'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $drives = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $drives;
    } else {
        return []; 
    }
}

$upcomingDrives = getAllDrives('upcoming');
$pastDrives = getAllDrives('past');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drives</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h1 {
            font-size: 24px;
            color: #9c0404;
            margin-bottom: 20px;
        }
        .drive {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .drive img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
        }
        .drive h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }
        .drive p {
            margin-bottom: 5px;
        }
        .drive p strong {
            font-weight: bold;
            color: #9c0404;
        }
        
        .past-drives {
            margin-bottom: 40px;
        }
        .past-drives h1 {
            color: #555;
            margin-bottom: 20px;
        }
      
        .upcoming-drives {
            margin-bottom: 40px;
        }
        .upcoming-drives h1 {
            color: #555;
            margin-bottom: 20px;
        }

       
    </style>
</head>
<body>
<div class="container">
<h1>Past Drives</h1>
        <?php foreach ($pastDrives as $drive) : ?>
            <div class="drive">
                <img src="../images/istockphoto-1150277164-612x612.jpg" alt="Drive Image">
                <h2><?php echo $drive['CampaignName']; ?></h2>
                <p><strong>Date:</strong> <?php echo $drive['Date']; ?></p>
                <p><strong>Location:</strong> <?php echo $drive['Location']; ?></p>
                <p><strong>StartTime:</strong> <?php echo $drive['StartTime']; ?></p>
                <p><strong>EndTime:</strong> <?php echo $drive['EndTime']; ?></p>
            </div>
        <?php endforeach; ?>

    
        <h1>Upcoming Drives</h1>
        <?php foreach ($upcomingDrives as $drive) : ?>
            <div class="drive">
                <img src="../images/istockphoto-1150277164-612x612.jpg" alt="Drive Image">
                <h2><?php echo $drive['CampaignName']; ?></h2>
                <p><strong>Date:</strong> <?php echo $drive['Date']; ?></p>
                <p><strong>Location:</strong> <?php echo $drive['Location']; ?></p>
                <p><strong>StartTime:</strong> <?php echo $drive['StartTime']; ?></p>
                <p><strong>EndTime:</strong> <?php echo $drive['EndTime']; ?></p>
            </div>
        <?php endforeach; ?>


    </div>
</body>
</html>
