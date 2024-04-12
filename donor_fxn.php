<?php

include "../settings/connection.php";
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<?php

function displayDonorsTable() {
    global $conn;
    
    $query = "SELECT * FROM Donors";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                   
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Contact Number</th>
                    <th>Medical History</th>
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["DateOfBirth"] . "</td>";
            echo "<td>" . $row["Gender"] . "</td>";
            echo "<td>" . $row["BloodGroup"] . "</td>";
            echo "<td>" . $row["ContactNumber"] . "</td>";
            echo "<td>" . $row["MedicalHistory"] . "</td>";
       
            echo "<td><a class='edit-btn' onclick=\"openEditModal('{$row['FirstName']}', '{$row['LastName']}', '{$row['DateOfBirth']}', '{$row['Gender']}', '{$row['BloodGroup']}', '{$row['ContactNumber']}', '{$row['MedicalHistory']}','{$row['DonorID']}')\" href=\"#\"><i class='material-symbols-outlined'>Edit</i></a>";

            echo "<a class='delete-btn' href='../actions/delete_donor_action.php?DonorID={$row['DonorID']}' onclick=\"return confirm('Are you sure you want to delete this drive?')\"><button><i class='material-symbols-outlined'>delete</i></button></a>";
            echo "</td>";

            echo "</tr>";
            $DonorID = $row['DonorID'];
        }
        echo "</table>";
        

        return $DonorID; 
    } else {
        echo "0 results";
    }

    $conn->close();
}

    
 
?>
