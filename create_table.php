<?php

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'hospital_management';

// create connection
$connection = mysqli_connect($server, $username, $password, $db);

if($connection) {
    echo 'Connection successful';
} else {
    die('Connection failed due to' . mysqli_connect_error());
}


// create table
$sql = 'create table doctors (id int, name varchar(255), email varchar(255), phone varchar(255), address varchar(255))';


if($connection->query($sql) === true){
    echo 'Table created successfully';
}else{
    echo 'Failed to create table: ' . $connection->error;
}

$connection->close()
?>