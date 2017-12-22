<?php
require 'config/config.php';
require 'includes/form_handlers/register_handlers.php';
require 'includes/form_handlers/login_handlers.php';
?>

<html>
<head>
  <title> Website - Website </title>
  <link rel="stylesheet" type="text/css" href= "assets/css/register_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>
<body>

  <?php
    if (isset($_POST['reg_button'])) {
      echo '
        <script>
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
        </script>
      ';

    }
  ?>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <h1> Web Dev </h1>
        Login or Sign-Up
      </div>

      <div id="first">
        <form action = "register.php" method="POST">
          <input type="email" name="log_email" placeholder="Email Address" value="<?php
            if(isset($_SESSION['log_email'])){
              echo $_SESSION['log_email'];}
              ?>" required>
          <br>
          <input type="password" name="log_passwd" placeholder="Password" required>
          <br>
          <input type="submit" name="login_button" value="Login">
          <br>
          <?php
            if (in_array("Incorrect Email or Password<br>", $error_array)){
              echo "Incorrect Email or Password<br>";}
          ?>
          <a href="#" id="signup" class="signup"> Need an account? Register here!</a>
        </form>
      </div>

      <div id="second">
        <!-- Create a form so web page can send data -->
        <!-- action allows to specify who's going to handle the data-->
        <!-- register.php is going to handle the form data -->
        <!-- use POST because the form contains sensitive information-->
        <form action="register.php" method="POST">
          <!-- required means it won't submit if there's no text-->
          <!--adding br places each input on it's own line-->
          <!--submit type defines a button for submitting-->
          <input type="text" name="reg_fname" placeholder="First Name" value="<?php
            if(isset($_SESSION['reg_fname'])){
              echo $_SESSION['reg_fname'];}
              ?>" required>
          <br>
          <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array))
          echo "Your first name must be between 2 and 25 characters<br>";?>

          <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
            if(isset($_SESSION['reg_lname'])){
              echo $_SESSION['reg_lname'];}
              ?>"required>
          <br>

          <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array))
          echo "Your last name must be between 2 and 25 characters<br>";?>

          <input type="email" name="reg_email" placeholder="Email" value="<?php
            if(isset($_SESSION['reg_email'])){
              echo $_SESSION['reg_email'];}
              ?>"required>
          <br>
          <input type="email" name="reg_emailConfirm" placeholder="Confirm Email" value="<?php
            if(isset($_SESSION['reg_emailConfirm'])){
              echo $_SESSION['reg_emailConfirm'];}
              ?>" required>
          <br>
          <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
                else if(in_array("Invalid Format<br>", $error_array)) echo "Invalid Format<br>";
                else if(in_array("Emails Do Not Match<br>", $error_array)) echo "Emails Do Not Match<br>"; ?>
          <input type="password" name="reg_passwd" placeholder="Password" required>
          <br>
          <input type="password" name="reg_passwdConfirm" placeholder="Confirm Password" required>
          <br>
          <?php if(in_array("Your password does not match<br>", $error_array)) echo "Your password does not match<br>";
                else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
                else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>
          <input type="submit" name="reg_button" value="Register">
          <br>
          <?php if(in_array("<span style='color: #14C800;'> You have successfully registered. Go login !</span><br>", $error_array))
          echo "<span style='color: #14C800;'> You have successfully registered. Go login !</span><br>";?>
          <a href="#" id="signin" class="signin"> Already have an account? Sign in here!</a>
        </form>
      </div>

    </div>
</div>
</body>
</html>
