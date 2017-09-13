<?php

$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.comp port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47";
$dbconn4 = pg_connect($conn_string);

function getdb() {
    $db = pg_connect("$conn_string") or die('connection failed');
    return $db;
}
?>

