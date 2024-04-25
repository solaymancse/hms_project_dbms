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
    <link rel="stylesheet" href="patient.css">

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

if (isset($_POST['submit'])) {
    // Process form submission

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['DOB'];
    $p_num = $_POST['phone_number'];
    $address = $_POST['address'];
  

    $sql = "INSERT INTO patient(first_name, last_name, gender, phone_number, DOB, address) 
            VALUES ('$f_name', '$l_name', '$gender', '$p_num', '$dob', '$address')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "New Patient Added successfully"; // Set success message in session
        header("Location: ./patient.php");
        exit();
    } else {
        $_SESSION['data'] = "Failed to insert patient";
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



            <form action="" method="post">
                <h3>Add New Patient</h3>
                <div class="div">
                    <div class="form-group">
                        <label for="name">First Name :</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name :</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob">Gender</label>
                    <select id="dropdown" name="gender" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Others</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth :</label>
                    <input type="date" class="form-control" name="DOB">
                </div>
                <div class="form-group">
                    <label for="email">address :</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="email">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number">
                </div>
             

                <input type="submit" name="submit" class="btn btn-primary" style="float:right">Submit</input>
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