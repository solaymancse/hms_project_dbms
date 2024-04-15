<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM department WHERE dep_id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: dep.php?msg=Record deleted successful");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>