<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
`
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>healthcare_provider</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/res.css">
    <link rel="stylesheet" href="../structure_css.css">

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }



        .l_container {
            margin-top: 100px;
        }

        .l_container form {
            background-color: skyblue;
            box-shadow: 5px 5px 10px black;

            box-sizing: border-box;
            padding: 30px;
            border-radius: 10px;


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

session_start();

include '../connection.php';



$success_message = "";
if (isset($_POST['submit'])) {

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['DOB'];
    $p_num = $_POST['phone_number'];
    $address = $_POST['address'];
    $balance_status = $_POST['balance_status'];
    $due_balance = $_POST['due_balance'];
    $paid_balance = $_POST['paid_balance'];

    $id = $_GET['id'];


    $sql = "UPDATE patient SET 
    first_name = '$f_name', Last_name = '$l_name',
    gender = '$gender', DOB = '$dob', phone_number = '$p_num',
    address = '$address', balance_status = '$balance_status', due_balance = $due_balance,
    paid_balance = $paid_balance WHERE patient_id = '$id'";



    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "Updated patient Successfully";
        $success_message = "successful";
        header("Location: patient.php");
    } else {
        $success_message = "not insert";
    }
}


?>





<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <?php

    include '../new_navbar.php';
    include '../new_sidebar.php';

    ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM patient WHERE patient_id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- main work start-->

    <main class="main">

        <div class="azaira"></div>

        <div class="l_container">

            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
                <div class="signup_logo">
                    <h1>Update Patient</h1>
                </div>
                <div class="box">
                    <label for="">First Name: </label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>">
                </div>
                <div class="box">
                    <label for="">Last name: </label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
                </div>
                <div class="box">
                    <label for="">Gender: </label>
                    <select name="gender" id="">
                        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="box">
                    <label for="">Phone Number: </label>
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                </div>
                <div class="box">
                    <label for="">Date of Birth: </label>
                    <input type="date" name="DOB" value="<?php echo $row['DOB']; ?>">
                </div>
                <div class="box">
                    <label for="">Address: </label>
                    <input type="text" name="address" value="<?php echo $row['address']; ?>">
                </div>
                <div class="box">
                    <label for="">Balance Status: </label>
                    <input type="text" name="balance_status" value="<?php echo $row['balance_status']; ?>">
                </div>
                <div class="box">
                    <label for="">Due Balance Status: </label>
                    <input type="text" name="due_balance" value="<?php echo $row['due_balance']; ?>">
                </div>
                <div class="box">
                    <label for="">Paid Balance Status: </label>
                    <input type="text" name="paid_balance" value="<?php echo $row['paid_balance']; ?>">
                </div>
                <div class="btn_box">
                    <input type="submit" value="Update" name="submit">
                    <a href="./patient.php">Return</a>
                </div>
                <div class="box">
                    <label id="success_message"><?php echo $success_message; ?></label>
                </div>
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