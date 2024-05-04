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


</head>





<?php
session_start();

include '../connection.php';

$search = "";

if (isset($_POST['search'])) {
    $search = $_POST['input_search'];
}

$sql = "SELECT lab_test.id, 
               CONCAT(patient.first_name, ' ', patient.last_name) AS patient_name, 
               CONCAT(healthcare_provider.first_name, ' ', healthcare_provider.last_name) AS provider_name, 
               test_category.name AS test_name,
               test_category.price AS test_price,
               lab_test.title, 
               lab_test.STATUS, 
               lab_test.discount, 
               lab_test.paid, 
               lab_test.due_amount 
        FROM lab_test
        LEFT JOIN patient ON lab_test.patient_id = patient.id
        LEFT JOIN healthcare_provider ON lab_test.h_provider_id = healthcare_provider.id
        LEFT JOIN test_category ON lab_test.test_id = test_category.id";

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






            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Health Provider</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    while ($row = mysqli_fetch_assoc($result_table)) {

                    ?>


                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['patient_name'] ?></td>
                            <td><?php echo $row['provider_name'] ?></td>
                            <td><?php echo $row['test_name'] ?></td>
                            <td><?php echo $row['STATUS'] ?></td>
                            <td>
                               
                                <a href="deliver_report.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Deliver</a>
                            </td>


                        <tr>



                        <?php

                    }
                        ?>

                </tbody>
            </table>
            <div>

            </div>







    </main>

    <!-- main work end-->


    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Record?
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
                        window.location.href = `lab_delete.php?id=${deleteId}`;
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-patient');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior

                    const patientId = button.getAttribute('data-id');

                    // Ask for confirmation before deleting
                    const isConfirmed = confirm('Are you sure you want to delete this patient?');

                    if (isConfirmed) {
                        // Redirect to delete_patient.php with patient_id parameter
                        window.location.href = `./patient_delete.php?id=${patientId}`;
                    }
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