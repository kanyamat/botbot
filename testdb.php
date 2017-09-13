<?php
$servername = "ec2-23-21-220-167.compute-1.amazonaws.com";
$username = "kywyvkvocykcqg";
$password = "76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
