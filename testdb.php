<?php

$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

