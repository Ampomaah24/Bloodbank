<?php
include "../settings/connection.php";


$query_blood_groups = "SELECT DISTINCT BloodGroup FROM Donors";
$result_blood_groups = mysqli_query($conn, $query_blood_groups);
if (!$result_blood_groups) {
    echo "Error fetching blood groups: " . mysqli_error($conn);
}
$blood_groups = mysqli_fetch_all($result_blood_groups, MYSQLI_ASSOC);


$selected_blood_group = isset($_GET['blood_group']) ? $_GET['blood_group'] : null;
$bloodInventory = [];

if ($selected_blood_group) {
   
    $query = "SELECT * FROM Donors WHERE BloodGroup = '$selected_blood_group'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        $bloodInventory = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
       
        echo "Error fetching blood inventory: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #9c0404;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        button {
            background-color: #9c0404;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #a93226;
        }

        .message {
            margin-top: 20px;
            color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Blood Inventory</h2>
        <form method="GET">
            <label for="blood_group">Select Blood Group:</label>
            <select name="blood_group" id="blood_group">
                <option value="" selected disabled>Select Blood Group</option>
                <?php foreach ($blood_groups as $group): ?>
                    <option value="<?php echo $group['BloodGroup']; ?>" <?php echo ($selected_blood_group === $group['BloodGroup']) ? 'selected' : ''; ?>>
                        <?php echo $group['BloodGroup']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Show Donors</button>
        </form>

        <?php if ($selected_blood_group): ?>
            <h3>Donors with Blood Group <?php echo $selected_blood_group; ?>:</h3>
            <?php if (!empty($bloodInventory)): ?>
                <table>
                    <thead>
                        <tr>
                            
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Contact Number</th>
                            <th>Medical History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bloodInventory as $donor): ?>
                            <tr>
                               
                                <td><?php echo $donor['FirstName']; ?></td>
                                <td><?php echo $donor['LastName']; ?></td>
                                <td><?php echo $donor['DateOfBirth']; ?></td>
                                <td><?php echo $donor['Gender']; ?></td>
                                <td><?php echo $donor['ContactNumber']; ?></td>
                                <td><?php echo $donor['MedicalHistory']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No donors found for selected blood group.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
