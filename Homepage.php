<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="styles.css"> 

  <title>Blood Bank Homepage</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;

    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      color:black;
    }

    .header {
      background: url('../images/GettyImages-giving blood_0.jpg') no-repeat; 
      background-size: cover;
      color: #fff;
      padding: 80px 0;
      text-align: center;
    }

    .header h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .header p {
      font-size: 20px;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .btn {
      display: inline-block;
      padding: 12px 24px;
      background-color: #800000; 
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      margin: 0 10px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #B22222; 
    }

    .about {
      background-color: #fff;
      padding: 40px;
      margin-top: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .about h2 {
      font-size: 32px;
      margin-bottom: 20px;
    }

    .about p {
      font-size: 18px;
      line-height: 1.6;
    }
  </style>
</head>
<body>

  <header class="header">
    <div class="container">
      <h1>Welcome to the Blood Bank</h1>
      <p>Your trusted source for safe, reliable blood donations</p>
      <a href="../users/Dashboard.php" class="btn">Dashboard</a>
      <a href="../view/logout.php" class="btn">Logout</a>
    </div>
  </header>

  <section class="about">
    <div class="container">
      <h2>About Us</h2>
      <p>At our blood bank, we are committed to saving lives through safe and reliable blood donations. With a dedicated team and state-of-the-art facilities, we ensure that every donation makes a difference. Join us in our mission to provide hope and support to those in need.</p>
    </div>
  </section>

</body>
</html>
