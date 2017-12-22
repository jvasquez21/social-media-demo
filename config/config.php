<?php
ob_start();
$timezone = date_default_timezone_set("America/Chicago");
session_start();
$connect = mysqli_connect("localhost", "root", "", "Facebook"); //Connects to the database
                          //DB_HOST    DB_USER  DB_PASSWD DB
if(mysqli_connect_errno()){
  echo "Failed to Connect: " . mysqli_connect_errno();
}

?>
