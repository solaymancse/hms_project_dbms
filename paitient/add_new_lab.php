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

$catData = "SELECT * FROM test_category";
$catResult = mysqli_query($conn, $catData);

if (isset($_POST['submit'])) {
    // Process form submission

    $patient_id = $_POST['patient_id'];
    $h_provider_id = $_POST['h_provider_id'];
    $catagory = $_POST['catagory'];
    $discount = $_POST['discount'];
    $total_amount = $_POST['total_amount'];
    $paid_amount = $_POST['paid_amount'];
    $due_amount = $_POST['due_amount'];

    $sql = "INSERT INTO lab_test (patient_id, h_provider_id, test_id,STATUS,discount,total_amount, paid, due_amount) VALUES ('$patient_id', '$h_provider_id', '$catagory', 'pending','$discount','$total_amount', '$paid_amount', '$due_amount')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['data'] = "New Test Added successfully";
        header("Location: lab.php");
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

                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="name">Select Patient</label>
                        <select id="dropdown" name="patient_id" class="form-control" required>
                            <option selected>Select</option>
                            <?php
                            while ($patient_row = mysqli_fetch_assoc($patientResult)) {
                            ?>
                                <option value="<?php echo $patient_row['id'] ?>"><?php echo $patient_row['first_name'] . " " . $patient_row['last_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name">HealthCare</label>
                        <select id="dropdown" name="h_provider_id" class="form-control" required>
                            <option selected>Select</option>
                            <?php
                            while ($provider_row = mysqli_fetch_assoc($hProviderResult)) {
                            ?>
                                <option value="<?php echo $provider_row['id'] ?>"><?php echo $provider_row['first_name'] . " " . $provider_row['last_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="catagory" class="form-control" required>
                        <option selected>Select</option>
                        <?php
                        while ($provider_row = mysqli_fetch_assoc($catResult)) {
                        ?>
                            <option value="<?php echo $provider_row['id'] ?>" data-price="<?php echo $provider_row['price'] ?>"><?php echo $provider_row['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="income">Discount</label>
                        <input type="number" class="form-control" id="discount" name="discount">
                    </div>
                </div>

                <div class="form-group">
                    <label for="income">Total Amount</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" readonly>
                </div>
                <div class="form-group">
                    <label for="paid_amount">Paid Amount</label>
                    <input type="number" class="form-control" id="paid_amount" name="paid_amount">
                </div>
                <div class="form-group">
                    <label for="due_amount">Due Amount</label>
                    <input type="number" class="form-control" id="due_amount" name="due_amount" readonly>
                </div>
                <button type="reset" class="btn">Reset</button>
                <button type="submit" class="btn" name="submit" style="float:right">Submit</button>
            </form>

        </div>
    </main>


    <!-- main work end-->



    <!-- jQuery -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update price based on selected category
            $('#category').change(function() {
                var price = $(this).find('option:selected').data('price');
                var discount = parseFloat($('#discount').val()) || 0;
                var totalPrice = price - discount;
                $('#price').val(totalPrice.toFixed(2));

                // Calculate total amount
                var paidAmount = parseFloat($('#paid_amount').val()) || 0;
                var totalAmount = totalPrice - discount;
                $('#total_amount').val(totalAmount.toFixed(2));

                var dueAmount = totalAmount - paidAmount;
                // Ensure due amount is not negative
                $('#due_amount').val(Math.max(0, dueAmount).toFixed(2));
            });

            // Function to update due amount based on paid amount
            $('#paid_amount').keyup(function() {
                var paidAmount = parseFloat($(this).val()) || 0;
                var totalAmount = parseFloat($('#total_amount').val()) || 0;
                var dueAmount = totalAmount - paidAmount;
                // Ensure due amount is not negative
                $('#due_amount').val(Math.max(0, dueAmount).toFixed(2));
            });

            // Function to update total amount based on discount
            $('#discount').keyup(function() {
                var discount = parseFloat($(this).val()) || 0;
                var price = parseFloat($('#price').val()) || 0;
                var totalPrice = price - discount;
                $('#total_amount').val(totalPrice.toFixed(2));

                var paidAmount = parseFloat($('#paid_amount').val()) || 0;
                var dueAmount = totalPrice - paidAmount;
                // Ensure due amount is not negative
                $('#due_amount').val(Math.max(0, dueAmount).toFixed(2));
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