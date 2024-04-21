<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM employee WHERE id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: all_employee.php");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>