<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'long_poll';
$conn = new mysqli($host, $user, $password, $db);
if($conn->connect_error) die('Unable to connect to db');
?>
