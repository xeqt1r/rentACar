<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'rent_car';

$conn = mysqli_connect($localhost, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

