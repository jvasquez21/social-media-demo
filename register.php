<?php
    $con = mysqli_connect("localhost", "root", "", "social"); // Connection variable
    
    if(mysqli_connect_errno()){
            echo "Failed to connect: " . mysqli_connect_errno(); // . (dot) add to the string
    }  
  //Declaring variables to prevent errors
  $fname = ""; //First name
  $lname = ""; //last name
  $em = ""; //email
  $em2 = ""; //email2
  $password = ""; //password
  $password2 = "";//password2
  $date = ""; //sign up date
  $error_array = ""; //holds error messages
 if(isset($POST['register_button'])){
     //registration form values
     //first name
      $fname = strip_tags($_POST['reg_fname']); //strip_tags security measures such as <a> name <a>
      $fname = str_replace(' ', '', $fname); //remove spaces
      $fname = ucfirst(strtolower($fname)); //convert letters to lowers and keeps first letter as upper case
      
      //last name
      $lname = strip_tags($_POST['reg_lname']); //strip_tags security measures such as <a> name <a>
      $lname = str_replace(' ', '', $lname); //remove spaces
      $lname = ucfirst(strtolower($lname)); //convert letters to lowers and keeps first letter as upper case
     
      //email
      $em = strip_tags($_POST['reg_email']); //strip_tags security measures such as <a> name <a>
      $em = str_replace(' ', '', $em); //remove spaces
      $em = ucfirst(strtolower($em)); //convert letters to lowers and keeps first letter as upper case
 
       //email2
      $em2 = strip_tags($_POST['reg_email2']); //strip_tags security measures such as <a> name <a>
      $em2 = str_replace(' ', '', $em2); //remove spaces
      $em2 = ucfirst(strtolower($em2)); //convert letters to lowers and keeps first letter as upper case
  
      //password
     $password = strip_tags($_POST['reg_password']); //removes html tags
     $password2 = strip_tags($_POST['reg_password2']); //removes html tags
 
     $date = date("Y-m-d"); //gets the current date 
 
  }
?>
<html>
<head>
    <title>Welcome to Systems!</title>
</head>
<body>

    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="register_button" value="Register">

    </form>



</body>
</html>
