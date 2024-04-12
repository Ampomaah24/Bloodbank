<?php

session_start();



if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];
} else {
  header("Location:../users/login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

*{ 
  margin:0;
  padding:0;
  box-sizing: border-box;
  font-family: 'Poppins';

}
body{
  overflow-x: hidden;
}

.dash{
  position: relative;
  width:100%;
}

.sidebar{
  position: fixed;
  width: 300px;
  height: 100%;
  background: linear-gradient(45deg, #47cebe, #ef4a82);
  overflow-x: hidden;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);


}

.sidebar ul li{
  width:100%;
  list-style: none;
}

.sidebar ul li:hover{
  background: #444;
}
.sidebar ul li:first-child{
  line-height:60px;
  margin-bottom:20px;
  font-weight:600;
  border-bottom: 1px solid white;

}
.sidebar ul li:first-child:hover{
  background: none;
}

.sidebar ul li a{
  width: 100%;
  text-decoration: none;
  color:white;
  height: 60px;
  display: flex;
  align-items: center;
}

.sidebar ul li a i{
  min-width:60px;
  font-size: 24px;
  text-align:center;

}

.sidebar .title{
  padding: 0 10px;
  font-size: 17px;
}
.main {
  /* width: calc(100% - 300px);  */
  padding: 20px;
  transition: width 0.3s; 
}

body {
  overflow-x: hidden; 
}


.sidebar {
  position: fixed;
  width: 300px;
  height: 100%;
  background: linear-gradient(45deg, #47cebe, #ef4a82);
  overflow-x: hidden;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  top: 0;
  left: 0; 
}


body {
  padding-left: 300px; 
}


body {
  transition: padding-left 0.3s;
}


.logo{
  position: relative;
  width:50px;
  height:50px;

}

img{
  position:absolute;
  width: 100%;
  height:100%;
  top:0;
  left:0;
  object-fit:cover;
}



.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 

}
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; 
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

    /* body {
      overflow-x: hidden;
    }
    .dash {
      position: relative;
      width: 100%;
    }
    .sidebar {
      position: fixed;
      width: 300px;
      height: 100%;
      background: linear-gradient(45deg, #47cebe, #ef4a82);
      overflow-x: hidden;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
    .sidebar ul {
      padding: 20px 0;
    }
    .sidebar ul li {
      list-style: none;
      line-height: 60px;
      font-weight: 600;
    }
    .sidebar ul li:first-child {
      border-bottom: 1px solid white;
      margin-bottom: 20px;
    }
    .sidebar ul li a {
      text-decoration: none;
      color: white;
      display: flex;
      align-items: center;
      padding-left: 20px;
    }
    .sidebar ul li a i {
      min-width: 60px;
      font-size: 24px;
    } */
    .main {
  margin-left: 0; 
  padding: 20px;
}
    h2 {
      margin-bottom: 20px;
    }
    .campaigns .campaign {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .campaigns .campaign h3 {
      margin-bottom: 10px;
    }
    .campaigns .campaign p {
      margin-bottom: 5px;
    }

    .drives-table-container {
  margin-top: 20px;
}

.drives-table {
  width: 100%;
  border-collapse: collapse;
  background-color: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.drives-table th,
.drives-table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #e0e0e0;
}

.drives-table th:first-child,
.drives-table td:first-child {
  padding-left: 20px;
}

.drives-table th:last-child,
.drives-table td:last-child {
  padding-right: 20px;
}

.drives-table tbody tr:last-child td {
  border-bottom: none;
}

.edit-btn,
.delete-btn {
  padding: 8px 16px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.table-container {
  
    margin-top: 20px;
    height: 400px; 
    overflow-y: auto; 
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

</style>
  <title>BB Dashboard</title>
</head>
<body>
<div class="dash">
  <div class="sidebar">
    <ul>
    <li>
        <a href ="#">
          <i class='bx bxs-dashboard' ></i>
          <div class="title">Dashboard</div>
        </a>
      </li>

      <li>
        <a href ="../admin/blood_d.php">
          <i class='bx bx-calendar-event'></i>
          <div class="title">Blood Drives</div>
        </a>
      </li>
      <li>
        <a href ="../admin/inventory_mgt.php">
          <i class='bx bx-store'></i>
          <div class="title">Inventory</div>
        </a>
      </li>

     

      <li>
        <a href ="../Profile/profile.php">
          <i class='bx bx-user'></i>
          <div class="title">Profile</div>
        </a>
      </li>
      <li>
        <a href ="d_register_mgt.php">
          <i class='bx bx-log-out'></i>
          <div class="title">Donor_mgt</div>
        </a>
      </li>

      <li>
        <a href ="../view/logout.php">
          <i class='bx bx-log-out'></i>
          <div class="title">Logout</div>
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="main">
  <div class="top">
    <div class="logo">
      <img src="../images/14052021-06_generated.jpg" alt="">
    </div>
  </div>

  <div class="table-container">
    <div class="heading">
      <h2>Blood Drives</h2>
    <?php


   include "../functions/drive_fxn.php";
   
displayDrivesTable($UserID);

  
   
    ?>
  </div>
</div>
</div>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
       
<form id="editForm" action="../actions/edit_drive_action.php" method="POST" onsubmit="submitForm(); return false;">
    <input type="hidden" id="editCampaignID" name="CampaignID" value="">
    <label for="editCampaignName">Campaign Name:</label>
    <input type="text" id="editCampaignName" name="CampaignName" value="">
    <button type="submit">Save</button>
</form>

    </div>
</div>

<script>
    var modal = document.getElementById("editModal");

    function openEditModal(CampaignID, CampaignName) {
        document.getElementById("editCampaignID").value = CampaignID;
        document.getElementById("editCampaignName").value = CampaignName;
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

