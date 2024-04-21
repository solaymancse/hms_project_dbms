<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Employee</title>
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
            width: auto;
            height: auto;
        }

        .l_container form {
            background-color: transparent;
            box-shadow: 5px 5px 10px black;

            box-sizing: border-box;
            padding: 30px;
            border-radius: 10px;
            min-width: 500px;


        }

        /* main work css end */
    </style>

</head>

<?php


include '../connection.php';

if (isset($_POST['submit'])) {

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['e_mail'];
    $type = $_POST['e_type'];
    $dob = $_POST['e_DOB'];
    $qual = $_POST['e_qualification'];
    $p_num = $_POST['e_phone_number'];
    $id = $_GET['id'];

    $sql = "UPDATE employee SET 
    first_name = '$f_name', last_name = '$l_name',
    email = '$email', DOB = '$dob', e_type= '$type', qualification='$qual', phone_number = '$p_num'
    WHERE id = '$id'";



    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "Updated Employee Successfully";
        $success_message = "successful";
        header("Location: all_employee.php");
    } else {
        $success_message = "not insert";
    }
}




?>



</head>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    include '../new_sidebar.php';
    include '../new_navbar.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Again, validate and sanitize this input
        $sql = "SELECT * FROM employee WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>


    <!-- main work start-->

    <main class="main">

        <div class="azaira"></div>

        <div class="l_container">


            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">

                <div class="row g-2 mb-3">
                    <div class="col-md ">
                        <div class="form-floating">
                            <input name="f_name" value="<?php echo $row['first_name']; ?>" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                            <label for="floatingTextarea">First Name</label>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="form-floating">
                            <input name="l_name" value="<?php echo $row['last_name']; ?>" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                            <label for="floatingTextarea">Last Name</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input name="e_mail" type="email" value="<?php echo $row['email']; ?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="e_DOB" value="<?php echo $row['DOB']; ?>" type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email Date of Birth</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="e_type" value="<?php echo $row['e_type']; ?>" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="Receptionist" <?php if ($row['e_type'] == 'Receptionist') echo 'selected'; ?>>Receptionist</option>
                        <option value="Accountant" <?php if ($row['e_type'] == 'Accountant') echo 'selected'; ?>>Accountant</option>
                        <option value="Laboratorist" <?php if ($row['e_type'] == 'Laboratorist') echo 'selected'; ?>>Laboratorist</option>
                    </select>

                    <label for="floatingSelect">Select Designation</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea name="e_qualification" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $row['qualification']; ?></textarea>
                    <label for="floatingTextarea2">Qualification</label>
                </div>

                <div class="form-floating mb-5">
                    <input value="<?php echo $row['phone_number']; ?>" name="e_phone_number" type="number" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                    <label for="floatingTextarea">Employee Phone Number</label>
                </div>
                <div class="form-floating">
                    <input name="submit" type="submit" value="update" class="btn btn-dark mb-4">
                </div>

                <div class="box">


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