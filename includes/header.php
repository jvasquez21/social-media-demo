<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details = mysqli_query($connect, "SELECT * FROM user WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details);
} else {
  header("Location: register.php");
}
?>
<html>
<head>
  <title> Website - Website</title> <!--Appears in the tabs of a web page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>

  <script src="https://use.fontawesome.com/445db70333.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body> <!--Website Content goes here-->
  <div class="top_bar">
    <div class="logo">
      <a href="index.php"> Web Development</a>
    </div>

    <nav>
      <a href="#">
        <?php echo $user['first_name']; ?>
      </a>
      <a href="index.php"> <i class="fa fa-home fa-fw" aria-hidden="true"></i></a>
      <a href="#"> <i class="fa fa-globe" aria-hidden="true"></i></i></a>
      <a href="#"> <i class="fa fa-comment" aria-hidden="true"></i></a>
      <a href="#"> <i class="fa fa-users" aria-hidden="true"></i></a>
      <a href="#"> <i class="fa fa-cog fa-fw" aria-hidden="true"></i></a>
      <a href="#"> <i class="fa fa-sign-out" aria-hidden="true"></i></i></a>
    </nav>
  </div>
