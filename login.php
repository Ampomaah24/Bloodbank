<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styling.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Blood Bank</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

*{ 
  margin:0;
  padding:0;
  box-sizing: border-box;
  font-family: 'Lato', sans-serif;
}
body{
  display:flex;
  justify-content: center;
  align-items:center;
  min-height:100vh;
  background: #f5f5f5; 
}

.login{
  display:flex;
  justify-content: center;
  flex-direction: column;
  width:440px;
  height:480px;
  padding:30px;
  background: #fff; 
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
}

.login-head{
  text-align:center;
  margin: 20px 0 40px 0;
}

.login-head header{
  color:#9c0404; 
  font-size:30px;
  font-weight:600;
}

.input-box .input{
  width: 100%;
  height:60px;
  font-size:17px;
  padding: 0 25px;
  margin-bottom: 15px;
  border-radius: 30px;
  border: none;
  box-shadow: 0px 5px 10px 1px rgba(0,0,0,0.05);
  outline: none;
  transition:0.3s;
}

.input-box .input::placeholder {
  color: #9c0404; 
  font-weight: bold;
}

.input:focus{
  width:105%;
}

.forgot{
  display:flex;
  justify-content:space-between;
  margin-bottom:20px;
}

section{
  display:flex;
  align-items:center;
  font-size:14px;
  color:#9c0404; 
}

#check{
  margin-right:10px;
}

a{
  text-decoration: none;
  color: #9c0404; 
}

a:hover{
  text-decoration: underline;
}

.submit{
  position:relative;
}

.button{
  width:100%;
  height:60px;
  background:#9c0404; 
  border:none;
  border-radius:30px;
  cursor:pointer;
  transition: 0.3s;
  margin-top:20px;
  color: #fff; 
  font-weight: bold; 
  font-size: 18px; 
  text-transform: uppercase; 
}

.button:hover{
  background:#7a0202; 
  transform: scale(1.05,1);
}

.link{
  text-align:center;
  font-size:15px;
  margin-top: 20px;
}

.link a{
  color : #9c0404; 
}

</style>
<body>
<form action='../actions/login_user_action.php' method="post" id="form">
<div class="login" id="login">
  <div class="login-head">
    <header>Blood Bank Login</header>
      <div class="input-box">
        <input type="text" class="input" placeholder="Email" name= "email" autocomplete="off" required>
      </div>

      <div class="input-box">
        <input type="password" class="input" name="pass_wd" placeholder="Password" autocomplete="off" required>
      </div>
      <?php
   
   if(isset($_SESSION['login_error'])) {
    echo "<div class=\"error-message\" style=\"color: red;\">" . $_SESSION['login_error'] . "</div>";
    unset($_SESSION['login_error']);
}

    
    ?>
      <div class="forgot">
        <section>
          <input type="checkbox" id="check">
          <label for ="check">Remember me</label>
        </section>
      </div>
      <div>
        <section>
          <a href="#">Forgot Password</a>
        </section>
      </div>
      <div class="submit">
        <button class="button" type="submit" name="login_b" id="sub btn">Sign In</button>
      </div>

      <div class="link">
        <p>Don't have an account? <a href ="../view/register.php">Sign Up</a></p>
      </div>
    </form>
  </div>
</div>
</body>
</html>
