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
    <link rel="stylesheet" href="salary.css">


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
            height: 600px;
            box-sizing: border-box;


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


$empData = "SELECT * FROM employee";
$empResult = mysqli_query($conn, $empData);

$hProviderData = "SELECT * FROM healthcare_provider";
$hProviderResult = mysqli_query($conn, $hProviderData);

$row = []; // Define $row to prevent undefined variable error
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM salary WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: all_salary.php");
    exit();
}


if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    $employee_id = $_POST['employee_id'];
    $h_provider_id = $_POST['h_provider_id'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $paid_amount = $_POST['paid_amount'];
    $due_amount = $_POST['due_amount'];
    $salary_date = $_POST['salary_date'];


    $sql = "UPDATE salary SET employee_id='$employee_id', h_provider_id='$h_provider_id', amount='$amount', salary_status='$status', paid_amount='$paid_amount', due_amount='$due_amount', salary_date='$salary_date' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // header("Location: healthcare_provider.php?msg=Record add successful");
        session_reset();
        $_SESSION['data'] = "update Salary successful";
        echo "<script>window.location.href='all_salary.php' </script>";
        // $success_message = "successful";
    } else {
        $_SESSION['data'] = "New Salary add failed";
        // $success_message = "failed";
    }
}


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

        <div class="l_container">


            <div class="form-wrap">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee</label>
                                <select id="dropdown" name="employee_id" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <?php
                                    while ($patient_row = mysqli_fetch_assoc($empResult)) {
                                        $selected = ($row['employee_id'] == $patient_row['id']) ? "selected" : "";
                                        echo "<option value='{$patient_row['id']}' $selected>{$patient_row['first_name']} {$patient_row['last_name']}</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provider</label>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Amount</label>
                                <input value="<?php echo $row['amount'] ?? ''; ?>" type="number" name="amount" id="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salary Status</label>
                                <select id="dropdown" name="status" class="form-control" required>
                                    <option disabled value>Select</option>
                                    <option value="paid" <?php echo ($row['salary_status'] === 'paid') ? 'selected' : ''; ?>>paid</option>
                                    <option value="due paid" <?php echo ($row['salary_status'] === 'partial paid') ? 'selected' : ''; ?>>partial paid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Paid Amount</label>
                                <input value="<?php echo $row['paid_amount'] ?? ''; ?>" type="number" name="paid_amount" id="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Due Amount</label>
                                <input value="<?php echo $row['due_amount'] ?? ''; ?>" type="number" name="due_amount" id="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Salary Date</label>
                                <input value="<?php echo $row['salary_date'] ?? ''; ?>" type="date" name="salary_date" id="number" class="form-control">
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>

                </form>
            </div>

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