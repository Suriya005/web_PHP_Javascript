<?php
$servername = "us-cdbr-east-04.cleardb.com";
$username = "b7b2c4b73a1200";
$password = "b5bcc419";
$database = "heroku_2de96acd0574390";


$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>