<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins";
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url('../images/180130_MM_blood002.jpg') no-repeat;
      background-size:cover;
      background-position:center;
    }

    .former {
      width: 750px;
      background: rgba(255, 255, 255,0.1);
      border-radius: 10px;
      color: #fff;
      padding: 30px;
    }

    .former h1 {
      font-size: 36px;
      text-align: center;
      margin-bottom: 20px;
      color:black;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      width: 150px;
      display: inline-block;
    }

    .form-group input {
      width: calc(50% - 80px);
      padding: 8px;
      border: none;
      border-radius: 5px;
    }

    .form-group.gender label {
      width: auto;
      margin-right: 20px;
    }

    .form-group.gender input {
      width: auto;
    }

    .submit-bt {
      width: 100%;
      padding: 10px;
      background-color: #dc3545;
      border: none;
      border-radius: 5px;
      color: #fff;
      cursor: pointer;
    }

    .submit-bt:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
<div class="former">
  <form action="../actions/register_user_action.php" method="post" id="Signing" onsubmit="return validateForm()">
    <h1>Register</h1>
    <div class="form-group">
      <label for="fname">Full Name:</label>
      <input type="text" id="fname" name="FirstName" placeholder="First name" required>
      <input type="text" id="lname" name="LastName" placeholder="Last name" required>
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="Email" placeholder="Enter your Email" required>
    </div>
    <div class="form-group">
      <label for="phoneNumber">Phone Number:</label>
      <input type="tel" id="phoneNumber" name="ContactNumber" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="DateOfBirth" required>
    </div>
    <div class="form-group gender">
      <label>Gender:</label>
      <label><input type="radio" name="Gender" value="Female"> Female</label>
      <label><input type="radio" name="Gender" value="Male"> Male</label>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="pass_wd" placeholder="Enter your password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase letter, one lowercase letter, and at least 8 or more characters">
    </div>
    <div class="form-group">
      <label for="Confirm">Confirm Password:</label>
      <input type="password" id="Confirm" name="Confirm" placeholder="Confirm Password" required>
    </div>

    <button name="sign-sub" class="submit-bt" type="submit">Sign Up</button>
  </form>
</div>
<script>
  function validateForm() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('Confirm').value;

    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }

    var selectedDate = new Date(document.getElementById('dob').value);
    var currentDate = new Date();

    if (selectedDate > currentDate) {
      alert("Invalid birthdate.");
      return false;
    }

    var requiredFields = document.querySelectorAll('[required]');
    for (var i = 0; i < requiredFields.length; i++) {
      if (!requiredFields[i].value.trim()) {
        alert("Please fill in all required fields.");
        return false;
      }
    }

    return true;
  }
</script>
</body>
</html>
