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
            text-align: justify;
            box-sizing: border-box;
            padding: 20px;
        }

        .table tbody td {
            max-height: 300px;

            border: 1px solid black;
        }
    </style>


</head>





<?php
session_start();
include '../connection.php';

$search = "";

if (isset($_POST['search'])) {
    $search = $_POST['input_search'];
}

$sql = "SELECT * FROM notice ORDER BY publish_date DESC";

$result_table = mysqli_query($conn, $sql);


?>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php

    include '../new_sidebar.php';
    include '../new_navbar.php';

    ?>


    <!-- main work start-->

    <main class="main">

        <div class="azaira"></div>


        <div class="container">

            <?php

            if (isset($_SESSION['data'])) {

                $msg = $_SESSION['data'];
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }


            ?>


            <div class="search_and-add_btn">
                <a href="add_notice.php" class="btn btn-dark mb-4">Add New Notice</a>

                <form action="" class="d-flex" method="post">
                    <input style="border: 1px solid black;" name="input_search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <input type="Submit" value="Search" name="search" class="btn btn-dark" id="">
                    </a>
                </form>



            </div>



            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Notice ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    while ($row = mysqli_fetch_assoc($result_table)) {

                    ?>


                        <tr>
                            <td><?php echo $row['id'] ?></th>
                            <td><?php echo $row['title'] ?></th>
                            <td><?php echo date('d-m-Y', strtotime($row['publish_date'])); ?></td>
                            <td><?php echo $row['description'] ?></th>
                            <td>

                                <a href="update_notice.php?id=<?php echo $row['id'] ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <button type="button" class="btn btn-danger delete-leave" data-id="<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#confirmationModal"><i class="fa-solid fa-trash fs-5"></i></button>

                            </td>

                        <tr>



                        <?php

                    }
                        ?>

                </tbody>
            </table>
        



    </main>

    <!-- main work end-->



    <!-- Add this modal at the end of your HTML body -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Notice?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-leave');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const deleteId = button.getAttribute('data-id');

                    document.getElementById('confirmDelete').addEventListener('click', function() {
                        // Redirect to delete script with the deleteId parameter
                        window.location.href = `delete_notice.php?id=${deleteId}`;
                    });
                });
            });
        });
    </script>
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