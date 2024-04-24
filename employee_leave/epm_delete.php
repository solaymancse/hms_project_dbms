

<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM employee_leave WHERE id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: employee_leave.php");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>