<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$DBname="dbform2";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$DBname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>


