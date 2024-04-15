<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'hospital_management';

// create connection
$connection = mysqli_connect($server, $username, $password, $db);

if ($connection) {
    echo 'Connection successful';
} else {
    die('Connection failed due to' . mysqli_connect_error());
}

$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phone = mysqli_real_escape_string($connection, $_POST['phone']);
$address = mysqli_real_escape_string($connection, $_POST['address']);

// create query
$sql = "INSERT INTO doctors (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

// execute query
if (mysqli_query($connection, $sql)) {
    echo 'Record inserted successfully';
} else {
    echo 'Failed to insert record: ' . mysqli_error($connection);
}

// close connection
mysqli_close($connection);
?>
