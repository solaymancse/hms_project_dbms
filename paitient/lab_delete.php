<?php
session_start();
include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM lab_test WHERE id= '$id'; ";


$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['data'] = "Lab Test Deleted successfully";
    header("Location: lab.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
