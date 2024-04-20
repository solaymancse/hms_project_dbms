<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>healthcare_provider</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../structure_css.css">


    <style>
        .table tbody td:nth-child(4) {
            max-width: 300px;

        }

        .table tbody td {
            max-height: 300px;

            border: 1px solid black;

        }


        /* start page css here */

        .m_container {
            height: 92vh;
            width: 100%;
            display: flex;
        }

        .s_bar {
            height: auto;
            width: auto;

        }

        .l_container {
            height: 84vh;
            width: 100%;

            overflow: scroll;

            box-sizing: border-box;
            padding: 50px;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .l_container form {
            height: 500px;
            width: 500px;

            box-sizing: border-box;
            padding: 40px;

        }


        .submit_btn {
            height: auto;
            width: auto;
            box-sizing: border-box;
            padding: 8px 20px;
            border: none;
            background-color: black;
            color: white;
            border-radius: 10px;

            transition: .4s;

        }

        .submit_btn:hover {
            box-shadow: 0px 0px 8px black;
            transition: .4s;

        }
    </style>


</head>





<?php

include '../connection.php';



if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];


    $sql = "INSERT INTO notice (title, publish_date, description) VALUES ('$title', '$date', '$description')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // header("Location: healthcare_provider.php?msg=Record add successful");
        session_reset();
        $_SESSION['data'] = "Record add successful";
        echo "<script>window.location.href='all_notice.php' </script>";
        // $success_message = "successful";
    } else {
        $success_message = "not insert";
    }
}


?>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    include 'notice_sidebar.php';
    include '../new_navbar.php';

    ?>


    <!-- main work start-->

    <main class="main">

        <div class="azaira"></div>

        <div class="l_container">


            <form method="post">

                <div class="mb-5">
                    <h3>Add New Notice</h3>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Notice Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Notice Date</label>
                    <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Notice Description</label>
                    <!-- <input type="text" name="d_name" class="form-control" id="exampleInputPassword1"> -->

                    <textarea name="description" class="form-control" id="exampleInputPassword1"></textarea>
                </div>

                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <input type="submit" value="submit" name="submit" class="submit_btn">
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