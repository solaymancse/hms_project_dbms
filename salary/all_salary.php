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
$whereClause = "";

if (isset($_POST['search'])) {
    $search = $_POST['input_search'];
    // Modify the WHERE clause to search by full name
    $whereClause = "WHERE (CONCAT(e.first_name, ' ', e.last_name) LIKE '%$search%') OR (CONCAT(hp.first_name, ' ', hp.last_name) LIKE '%$search%')";
}
$sql = "SELECT 
            el.id,
            e.first_name AS employee_first_name,
            e.last_name AS employee_last_name,
            hp.first_name AS provider_first_name,
            hp.last_name AS provider_last_name,
            el.amount,
            el.paid_amount,
            el.salary_status,
            el.salary_date,
            el.bonus,
            el.deduction
        FROM 
            salary AS el
        LEFT JOIN 
            employee AS e ON el.employee_id = e.id
        LEFT JOIN 
            healthcare_provider AS hp ON el.h_provider_id = hp.id
        $whereClause";


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
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $_SESSION['data'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['data']);
            }
            ?>


            <div class="search_and-add_btn">
                <a href="add_salary.php" class="btn btn-dark mb-4">Add New Salary</a>

                <form action="" class="d-flex" method="post">
                    <input style="border: 1px solid black;" name="input_search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <input type="Submit" value="Search" name="search" class="btn btn-dark" id="">
                    </a>
                </form>



            </div>



            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Employee</th>
                        <th scope="col">HealthCare Provider</th>
                        <th scope="col">Amount ($)</th>
                        <th scope="col">Paid Amount  ($)</th>
                        <th scope="col">Bonus  ($)</th>
                        <th scope="col">Deduction  ($)</th>
                        <th scope="col">Salary Status</th>
                        <th scope="col">Payment Month</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    while ($row = mysqli_fetch_assoc($result_table)) {

                    ?>


                        <tr>
                            <td><?php echo $row['employee_first_name'] . ' ' . $row['employee_last_name']; ?></td>
                            <td><?php echo $row['provider_first_name'] . ' ' . $row['provider_last_name']; ?></td>

                            <td><?php echo $row['amount'] ?></th>
                            <td><?php echo $row['paid_amount'] ?></th>
                            <td><?php echo $row['bonus'] ?></th>
                            <td><?php echo $row['deduction'] ?></th>
                            <td><?php echo $row['salary_status'] ?></th>
                            <td><?php echo date('d M, Y', strtotime($row['salary_date'])); ?></td>
                            <td>

                                <a href="update_salary.php?id=<?php echo $row['id'] ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
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
                    Are you sure you want to delete this Salaray?
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
                        window.location.href = `delete_salary.php?id=${deleteId}`;
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