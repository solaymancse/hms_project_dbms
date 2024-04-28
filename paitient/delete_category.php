<?php
session_start();

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM test_category WHERE id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "Test Category delete successful";
        header("Location: category.php");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>