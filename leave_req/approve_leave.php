<?php
session_start();
include '../connection.php';

if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Update the status to 'approved'
    $update_sql = "UPDATE employee_leave SET status = 'approved' WHERE id = $leave_id";
    mysqli_query($conn, $update_sql);

    $_SESSION['data'] = "Leave request approved successfully.";
}

header("Location: ../employee_leave/employee_leave.php");
exit();
?>
