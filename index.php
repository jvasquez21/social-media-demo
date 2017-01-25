<?php
$con = mysqli_connect("localhost", "root", "", "social"); // Connection variable

if(mysqli_connect_errno()){
	echo "Failed to connect: " . mysqli_connect_errno(); // . (dot) add to the string
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Zelda')");

?>

<html>
<head>
	<title>system newsfeed</title>
</head>
<body>
	Hello Systems!
</body>
</html>
