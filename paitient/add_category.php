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

if (isset($_POST['submit'])) {
    // Process form submission

    $name = $_POST['name'];
    $price = $_POST['price'];
 

    $sql = "INSERT INTO test_category (name, price) VALUES ('$name', '$price')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "New Test Category Added successfully";
        header("Location: category.php");
        exit();
    } else {
        $success_message = "Failed to insert patient";
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
                <h3>Add New Lab Test</h3>

                <!-- <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        <option value="Blood count" <?php if (isset($row['category']) && $row['category'] == 'Blood count') echo 'selected'; ?>>Blood count</option>
                        <option value="Lipid panel" <?php if (isset($row['category']) && $row['category'] == 'Lipid panel') echo 'selected'; ?>>Lipid panel</option>
                        <option value="Thyroid panel" <?php if (isset($row['category']) && $row['category'] == 'Thyroid panel') echo 'selected'; ?>>Thyroid panel</option>
                        <option value="Liver panel" <?php if (isset($row['category']) && $row['category'] == 'Liver panel') echo 'selected'; ?>>Liver panel</option>
                        <option value="Blood typing" <?php if (isset($row['category']) && $row['category'] == 'Blood typing') echo 'selected'; ?>>Blood typing</option>
                        <option value="Comprehensive metabolic panel" <?php if (isset($row['category']) && $row['category'] == 'Comprehensive metabolic panel') echo 'selected'; ?>>Comprehensive metabolic panel</option>
                        <option value="Glucose" <?php if (isset($row['category']) && $row['category'] == 'Glucose') echo 'selected'; ?>>Glucose</option>
                        <option value="Inflammatory markers" <?php if (isset($row['category']) && $row['category'] == 'Inflammatory markers') echo 'selected'; ?>>Inflammatory markers</option>
                        <option value="Sedimentation rate" <?php if (isset($row['category']) && $row['category'] == 'Sedimentation rate') echo 'selected'; ?>>Sedimentation rate</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="price">Test Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="income">Price</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <button type="reset" class="btn">Reset</button>
                <button type="submit" class="btn" name="submit" style="float:right">Submit</button>
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