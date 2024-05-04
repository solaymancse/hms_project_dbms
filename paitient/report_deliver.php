<?php
session_start();
include '../connection.php';

if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Update the status to 'approved'
    $update_sql = "UPDATE lab_test SET status = 'Delivered' WHERE id = $leave_id";
    mysqli_query($conn, $update_sql);

    $_SESSION['data'] = "Lab Report successfully Deliver";
}

header("Location: ../paitient/lab.php");
exit();
?>
