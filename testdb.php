<?php
$servername = "ec2-23-21-220-167.compute-1.amazonaws.com";
$username = "kywyvkvocykcqg";
$password = "76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>