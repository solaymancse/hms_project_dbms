<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM notice WHERE notice_id= '$id';";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: all_notice.php?msg=Record deleted successful");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>