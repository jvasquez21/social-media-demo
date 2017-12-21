<?php
require 'config/config.php';

$query = mysqli_query($connect, "INSERT INTO UserLoginInfo VALUES ('1', 'Navi')");  // Insert a value into a table
                                                                                    // From our database
?>
<html>
<head>
  <title> Website - Website</title> <!--Appears in the tabs of a web page-->
</head>
<body> <!--Website Content goes here-->
  Immerse yourself in web development.
</body>
</html>
