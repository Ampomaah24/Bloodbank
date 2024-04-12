<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Management</title>
    
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .edit-btn,
        .delete-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #47cebe;
            color: #fff;
            display: inline-block; 
        }

        .delete-btn {
            background-color: #ef4a82;
            color: #fff;
            margin-left: 8px;
            display: inline-block; 
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #555;
        }

        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }

       
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .action-btns {
            margin-top: 10px;
        }
    
    </style>
</head>
<body>
<h2> Donors </h2>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include "../functions/donor_fxn.php";

  $DonorID=displayDonorsTable();

?>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
    <h2>Edit Donor</h2>
    <form id="editForm" action="../actions/edit_donor_action.php?DonorID=<?php echo $DonorID; ?>" method="POST" onsubmit="submitForm(); return false;">
    <input type="hidden" name="DonorID" value="<?php echo $DonorID; ?>">

        
        <label for="editFirstName">First Name:</label>
        <input type="text" id="editFirstName" name="FirstName" >
        
        <label for="editLastName">Last Name:</label>
        <input type="text" id="editLastName" name="LastName" >
        
        <label for="editDateOfBirth">Date of Birth:</label>
        <input type="date" id="editDateOfBirth" name="dob" >
        
        <label for="editGender">Gender:</label>
        <select id="editGender" name="Gender" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        
        <label for="editBloodGroup">Blood Group:</label>
        <select id="editBloodGroup" name="BloodGroup" >
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        
        <label for="editContactNumber">Contact Number:</label>
        <input type="tel" id="editContactNumber" name="ContactNumber" >
        
        <label for="editMedicalHistory">Medical History:</label>
        <select id="editMedicalHistory" name="MedicalHistory" >
            <option value="None">None</option>
            <option value="Hypertension">Hypertension</option>
            <option value="Diabetes">Diabetes</option>
            <option value="Asthma">Asthma</option>
            <option value="Aids">Aids</option>
            <option value="Other">Other</option>
        </select>
        
        
        <button type="submit">Save Changes</button>
    </form>
  </div>

</div>

<script>
    var modal = document.getElementById("editModal");
    

    function openEditModal(firstName, lastName, dateOfBirth, gender, bloodGroup, contactNumber, medicalHistory) {
        document.getElementById("editFirstName").value = firstName;
        document.getElementById("editLastName").value = lastName;
        document.getElementById("editDateOfBirth").value = dateOfBirth;
        document.getElementById("editGender").value = gender;
        document.getElementById("editBloodGroup").value = bloodGroup;
        document.getElementById("editContactNumber").value = contactNumber;
        document.getElementById("editMedicalHistory").value = medicalHistory;
         modal.style.display = "block";
    }
        function closeEditModal() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function submitForm(event) {
    event.preventDefault(); 
    
    var form = document.getElementById("editForm");
    var formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(response => {
        if (response.ok) {
            console.log("Form submitted successfully");
            closeEditModal();
            location.reload(); 
        } else {
            console.error("Form submission failed");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>


</body>
</html>