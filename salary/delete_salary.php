<?php
session_start();
include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM salary WHERE id= '$id'; ";


$result = mysqli_query($conn, $sql);

if ($result) {
    session_reset();
    $_SESSION['data'] = "Successfully deleted";
    header("Location: all_salary.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}
