<?php
  session_start();
  // if(!isset($_SESSION['Email']));
  // {
  //   header("Location:login.php");
  // }
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <title>Customer Login/Register</title>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
    
   </head>
<body style="background: #d8e3b0eb;">
  <div class="container">
    <div class="col-md-6">
      <?php
        if(isset($_SESSION['status']))
        {
          ?>   
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey User!</strong> <?php echo $_SESSION['status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
          unset($_SESSION['status']);
        }
      ?>
    </div>
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/plant1.png" style="border-radius: 25px;" alt="">
        <div class="text">
          <span class="text-1">Plants exist in the weather <br>and lights rays that <br> surround them</span>
          <span class="text-2">Plants are solar powered air purifiers <br> whose filter never needs replacing. <br> So plant your own gardens and decorate your <br> own soul, instead of waiting for someone <br> to bring you flowers.</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" style="border-radius: 25px;" src="images/plant2.png" alt="">
        <div class="text">
          <span class="text-1">Plants exist in the weather <br>and lights rays that <br> surround them</span>
          <span class="text-2">Plants are solar powered air purifiers <br> whose filter never needs replacing. <br> So plant your own gardens and decorate your <br> own soul, instead of waiting for someone <br> to bring you flowers.</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <!-- LOGIN FORM -->
            <div class="title">Login</div>
          <form action="code.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email"  name="email">
              </div>
              <br>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password">
                
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="login_btn" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <!-- SINGUP FORM -->
          <div class="title">Signup</div>
        <form id="regForm" action="code.php" method="post" onsubmit="return validateForm()">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" id="firstname" name="first_name">
              </div>
              <br>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" id="email" name="email">
              </div>
              <br>
              <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="number" placeholder="+91 9876543210" id="number" name="number">
              </div>
              <br>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" id="psw" name="psw">
              </div>
              <br>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Re-enter password" id="confirmpsw" name="confirmpassword">
              </div>
              <div class="button input-box">
                <input type="submit" name="register" value="Register">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
  <script src="valid.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
