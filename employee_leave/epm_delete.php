

<?php
session_start();

include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM employee_leave WHERE id= '$id'; ";


$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['data'] = "Successfully deleted";
    header("Location: employee_leave.php");
} else {
    echo "Failed: " . mysqli_error($conn);
}

?>