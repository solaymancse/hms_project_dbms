<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>healthcare_provider</title>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../structure_css.css">
    <link rel="stylesheet" href="./patient.css">

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }



        #success_message {

            height: auto;
            width: 100%;
            text-align: center;
            color: green;


        }

        /* main work css end */
    </style>



</head>

<?php
session_start(); // Start the session

include '../connection.php';

$success_message = "";

$patientData = "SELECT * FROM patient";
$patientResult = mysqli_query($conn, $patientData);

$hProviderData = "SELECT * FROM healthcare_provider";
$hProviderResult = mysqli_query($conn, $hProviderData);

if (isset($_GET['id'])) {
    $test_id = $_GET['id'];
    $sql = "SELECT * FROM lab_test WHERE id='$test_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $test_id = $_GET['id'];
    $patient_id = $_POST['patient_id'];
    $h_provider_id = $_POST['h_provider_id'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $discount = $_POST['discount'];

    $sql = "UPDATE lab_test SET patient_id='$patient_id', h_provider_id='$h_provider_id', title='$title', STATUS='$status', discount='$discount' WHERE id='$test_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "Test Updated successfully"; // Set success message in session
        header("Location: lab.php");
        exit();
    } else {
        $success_message = "Failed to update test";
    }
}
?>







</head>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    include '../new_sidebar.php';
    include '../new_navbar.php';

    ?>


    <!-- main work start-->

    <main class="main">

        <div class="azaira"></div>
        <div class="l_container">


            <form method="post">
                <h3>Update Lab Test</h3>
                <div class="div">
                    <div class="form-group">
                        <label for="name">Select Patient</label>
                        <select id="dropdown" name="patient_id" class="form-control" required>
                            <?php
                            while ($patient_row = mysqli_fetch_assoc($patientResult)) {
                                $selected = ($row['patient_id'] == $patient_row['id']) ? "selected" : "";
                                echo "<option value='{$patient_row['id']}' $selected>{$patient_row['first_name']} {$patient_row['last_name']}</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">HealthCare</label>
                        <select id="dropdown" name="h_provider_id" class="form-control" required>
                            <?php
                            while ($provider_row = mysqli_fetch_assoc($hProviderResult)) {
                                $selected = ($row['h_provider_id'] == $provider_row['id']) ? "selected" : "";
                                echo "<option value='{$provider_row['id']}' $selected>{$provider_row['first_name']} {$provider_row['last_name']}</option>";
                            }
                            ?>

                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label for="email">Title</label>
                    <input type="text" class="form-control" value="<?php echo $row['title'] ?? ''; ?>" name="title">
                </div>
                <div class="form-group">
                    <label for="address">Status :</label>
                    <input type="text" class="form-control" value="<?php echo $row['STATUS'] ?? ''; ?>" name="status">
                </div>
                <div class="form-group">
                    <label for="income">discount</label>
                    <input type="number" class="form-control" value="<?php echo $row['discount'] ?? ''; ?>" name="discount">
                </div>


                <button type="reset" class="btn">Reset</button>
                <button type="submit" class="btn" name="submit" style="float:right">Update</button>
            </form>

        </div>




    </main>

    <!-- main work end-->





    <!-- sidebar and navbar js file start -->

    <script>
        const sidebar = document.querySelector(".sidebar");
        const sidebarClose = document.querySelector("#sidebar-close");
        const menu = document.querySelector(".menu-content");
        const menuItems = document.querySelectorAll(".submenu-item");
        const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

        sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

        menuItems.forEach((item, index) => {
            item.addEventListener("click", () => {
                menu.classList.add("submenu-active");
                item.classList.add("show-submenu");
                menuItems.forEach((item2, index2) => {
                    if (index !== index2) {
                        item2.classList.remove("show-submenu");
                    }
                });
            });
        });

        subMenuTitles.forEach((title) => {
            title.addEventListener("click", () => {
                menu.classList.remove("submenu-active");
            });
        });
    </script>
    <!-- sidebar and navbar js file end -->



</body>

</html>