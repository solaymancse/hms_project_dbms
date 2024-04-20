<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM patient WHERE patient_id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: patient.php");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>