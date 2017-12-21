<?php
$fname = "";      // First name
$lname = "";      // Last name
$email = "";      // Email
$emailCon = "";   // Email Confirm
$passwd = "";     // Passwd
$passwdCon = "";  // Passwd Confirm
$date = "";  // When the user registered
$error_array = array(); // Hold error messages

if(isset($_POST['reg_button'])){

  //Registation form values
  // strip_tags removes <> in case of user input html code
  // str_replace in this case we are removing spaces

  // First Name
  $fname = strip_tags($_POST['reg_fname']);
  $fname = str_replace(' ', '', $fname);
  $fname = ucfirst(strtolower($fname)); // First letter is cap
  $_SESSION['reg_fname'] = $fname; // stores the first name into session

  // Last Name
  $lname = strip_tags($_POST['reg_lname']);
  $lname = str_replace(' ', '', $lname);
  $lname = ucfirst(strtolower($lname)); // First letter is cap
  $_SESSION['reg_lname'] = $lname; // stores the last name into session

  // Email
  $email = strip_tags($_POST['reg_email']);
  $email = str_replace(' ', '', $email);
  $email = ucfirst(strtolower($email)); // First letter is cap
  $_SESSION['reg_email'] = $email; // stores the email into session

  // Confirming Email
  $emailCon = strip_tags($_POST['reg_emailConfirm']);
  $emailCon = str_replace(' ', '', $emailCon);
  $emailCon = ucfirst(strtolower($emailCon)); // First letter is cap
  $_SESSION['reg_emailConfirm'] = $emailCon; // stores the email into session

  // Password
  $passwd = strip_tags($_POST['reg_passwd']);

  // Password Confirm
  $passwdCon = strip_tags($_POST['reg_passwdConfirm']);

  $date = date("Y-m-d");  // Gets the current date

  // Error checking Emails

  if($email == $emailCon){
    // Check if the email is in a valid format
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);

      // Check if email already exists

      $e_check = mysqli_query($connect, "SELECT email FROM user WHERE email= '$email'");

      //Count number of rows returned

      $num_rows = mysqli_num_rows($e_check);

      if($num_rows > 0){
        array_push($error_array, "Email already in use<br>");
      }

    }else {
      array_push($error_array, "Invalid Format<br>");
    }
  }else {
    array_push($error_array, "Emails Do Not Match<br>");
  }


  if (strlen($fname) > 25 || strlen($fname) < 2){
    array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
  }

  if (strlen($lname) > 25 || strlen($lname) < 2){
    array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
  }

  if ($passwd != $passwdCon) {
    array_push($error_array, "Your password does not match<br>");
  } else {
    if (preg_match('/[^A-Za-z0-9]/', $passwd)) {
      array_push($error_array, "Your password can only contain english characters or numbers<br>");
    }
  }

  if (strlen($passwd) > 30 || strlen($passwd) < 5){
    array_push($error_array, "Your password must be between 5 and 30 characters<br>");
  }

  // encrypts the password before sending it to the database
  if (empty($error_array)) {
    $passwd = md5($passwd);

    // generate username by combining first and last name

    $username = strtolower($fname . '_' .$lname);
    $check_username = mysqli_query($connect, "SELECT username FROM user WHERE username='$username'");

    $i = 0;

    // if username exists add number to username

    while(mysqli_num_rows($check_username) != 0){
      $i++;
      $username = $username . '_' . $i;
      $check_username = mysqli_query($connect, "SELECT username FROM user WHERE username='$username'");
    }

    // Profile pics
    $rand = rand(1, 2);

    if ($rand == 1)
      $profile_pic = "/assets/images/profile_pics/defaults/head_deep_blue.png";
    else if ($rand == 2)
      $profile_pic = "/assets/images/profile_pics/defaults/head_emerald.png";


    $query = mysqli_query($connect, "INSERT INTO user VALUES ('', '$fname', '$lname', '$username', '$email', '$passwd', '$date', '$profile_pic', '0', '0', 'no', ',')");
    array_push($error_array, "<span style='color: #14C800;'> You have successfully registered. Go login !</span><br>");

    // clear session
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_lname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_emailConfirm'] = "";
  }

 }
?>
