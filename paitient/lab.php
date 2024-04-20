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

$sql = "SELECT lab_test.id, patient.first_name , patient.last_name AS patient_name, healthcare_provider.first_name , healthcare_provider.last_name AS provider_name, lab_test.title, lab_test.STATUS, lab_test.discount FROM lab_test
        LEFT JOIN patient ON lab_test.patient_id = patient.id
        LEFT JOIN healthcare_provider ON lab_test.h_provider_id = healthcare_provider.id";

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

                <a href="add_new_lab.php" class="btn btn-dark mb-4">Add New</a>

                <form action="" class="d-flex" method="post">
                    <input style="border: 1px solid black;" name="input_search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <input type="Submit" value="Search" name="search" class="btn btn-dark" id="">
                    </a>
                </form>



            </div>



            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Health Provider</th>
                        <th scope="col">Title</th>
                        <th scope="col">Staus</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    while ($row = mysqli_fetch_assoc($result_table)) {

                    ?>


                        <tr>
                            <td><?php echo $row['id'] ?></th>
                            <td><?php echo $row['patient_name'] ?></th>
                            <td><?php echo $row['provider_name'] ?></th>


                            <td><?php echo $row['title'] ?></th>
                            <td><?php echo $row['STATUS'] ?></th>
                            <td><?php echo $row['discount'] ?></th>
                            <td>
                                <a href="./edit_lab.php?id=<?php echo $row['id'] ?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="#" class="btn btn-danger delete-patient" data-id="<?php echo $row['id'] ?>"><i class="fa-solid fa-trash fs-5"></i></a>
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