<?php
session_start();

if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];
} else {
  header("Location:../users/login.php");
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

    * { 
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins';
    }
    body {
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
    }
    .main {
      margin-left: 300px;
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
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.edit-btn {
  background-color: #47cebe;
  color: #fff;
}

.delete-btn {
  background-color: #ef4a82;
  color: #fff;
  margin-left: 8px;
}

.edit-btn:hover,
.delete-btn:hover {
  background-color: #555;
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


  </style>
  <title>BB Dashboard</title>
</head>
<body>
  <div class="dash">
    <div class="sidebar">
      <ul>
        <li>
          <a href="Dashboard.php">
            <i class='bx bxs-dashboard'></i>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="Donor_registration.php">
            <i class='bx bx-user-plus'></i>
            <span class="title">Donor Registration</span>
          </a>
        </li>
        <li>
          <a href="up_drives.php">
            <i class='bx bx-calendar-event'></i>
            <span class="title">Upcoming Campaigns</span>
          </a>
        </li>
        <li>
          <a href="Inventory.php">
            <i class='bx bx-store'></i>
            <span class="title">Blood Inventory</span>
          </a>
        </li>
        <li>
          <a href="../Profile/profile.php">
            <i class='bx bx-user'></i>
            <span class="title">Profile</span>
          </a>
        </li>
        <li>
          <a href="../view/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="title">Logout</span>
          </a>
        </li>
      </ul>
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
</body>
</html>
