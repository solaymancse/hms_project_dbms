

<?php

    include'../connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM healthcare_provider WHERE h_provider_id= '$id'; ";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: healthcare_provider.php?msg=Record deleted successful");
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

?>