<?php
  if(isset($_POST['login_button'])) {
    // checks if the email is in correct format
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $email; // Store email into the session

    $passwd = md5($_POST['log_passwd']); //get password

    $check_database = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$passwd'");
    $check_login = mysqli_num_rows($check_database);

    if ($check_login == 1) {
      $row = mysqli_fetch_array($check_database);
      $username = $row['$username'];

      $user_closed = mysqli_query($connect, "SELECT * FROM user WHERE EMAIL='$email' AND user_closed='yes'");
      if (mysqli_num_rows($user_closed) == 1) {
        $reopen_acct = mysqli_query($connect, "UPDATE user SET user_closed='no' WHERE email='$email'");
      }
      $_SESSION['username'] = $username;

      header("Location: index.php");
      exit();
    }else {
      array_push($error_array, "Incorrect Email or Password<br>");
    }
  }
?>
