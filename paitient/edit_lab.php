<!DOCTYPE html>
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
    </style>
</head>

<body>

    <?php
    session_start(); // Start the session
    include '../connection.php';

    $success_message = "";

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Process form submission
        $test_id = $_POST['test_id'];
        $patient_id = $_POST['patient_id'];
        $h_provider_id = $_POST['h_provider_id'];
        $catagory = $_POST['catagory'];
        $discount = $_POST['discount'];
        $total_amount = $_POST['total_amount'];
        $paid_amount = $_POST['paid_amount'];
        $due_amount = $_POST['due_amount'];

        // SQL query to update the lab test data
        $sql = "UPDATE lab_test 
            SET patient_id='$patient_id', 
                h_provider_id='$h_provider_id', 
                test_id='$catagory', 
                discount='$discount', 
                total_amount='$total_amount', 
                paid='$paid_amount', 
                due_amount='$due_amount' 
            WHERE id='$test_id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['data'] = "Lab Test updated successfully";
            header("Location: lab.php");
            exit();
        } else {
            $success_message = "Failed to update lab test";
        }
    }

    $patientData = "SELECT * FROM patient";
    $patientResult = mysqli_query($conn, $patientData);

    $hProviderData = "SELECT * FROM healthcare_provider";
    $hProviderResult = mysqli_query($conn, $hProviderData);

    $catData = "SELECT * FROM test_category";
    $catResult = mysqli_query($conn, $catData);



    // If a test ID is provided, fetch the test details from the database
    if (isset($_GET['id'])) {
        $test_id = $_GET['id'];
        $testData = "SELECT * FROM lab_test WHERE id='$test_id'";
        $testResult = mysqli_query($conn, $testData);
        $test_row = mysqli_fetch_assoc($testResult);
    }
    ?>

    <?php
    include '../new_sidebar.php';
    include '../new_navbar.php';
    ?>

    <main class="main">
        <div class="azaira"></div>
        <div class="l_container">
            <form method="post">
                <h3><?php echo 'Update Lab Test'; ?></h3>
                <!-- Set the value of the hidden input field for test ID -->
                <input type="hidden" name="test_id" id="test_id" value="<?php echo $test_id; ?>">
                <div class="row form-group">
                    <!-- Populate the form fields with test details if updating -->
                    <div class="col-md-6">
                        <label for="name">Select Patient</label>
                        <select id="dropdown_patient" name="patient_id" class="form-control" required>
                            <option selected>Select</option>
                            <?php
                            while ($patient_row = mysqli_fetch_assoc($patientResult)) {
                                $selected = ($test_row['patient_id'] == $patient_row['id']) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $patient_row['id'] ?>" <?php echo $selected; ?>><?php echo $patient_row['first_name'] . " " . $patient_row['last_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name">HealthCare</label>
                        <select id="dropdown_provider" name="h_provider_id" class="form-control" required>
                            <option selected>Select</option>
                            <?php
                            while ($provider_row = mysqli_fetch_assoc($hProviderResult)) {
                                $selected = ($test_row['h_provider_id'] == $provider_row['id']) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $provider_row['id'] ?>" <?php echo $selected; ?>><?php echo $provider_row['first_name'] . " " . $provider_row['last_name'] ?></option>
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
                            $selected = ($test_row['test_id'] == $provider_row['id']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $provider_row['id'] ?>" data-price="<?php echo $provider_row['price'] ?>" <?php echo $selected; ?>><?php echo $provider_row['name'] ?></option>
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
                        <input type="number" class="form-control" id="discount" name="discount" value="<?php echo isset($test_row['discount']) ? $test_row['discount'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="income">Total Amount</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" readonly>
                </div>
                <div class="form-group">
                    <label for="paid_amount">Paid Amount</label>
                    <input type="number" class="form-control" id="paid_amount" name="paid_amount" value="<?php echo isset($test_row['paid']) ? $test_row['paid'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="due_amount">Due Amount</label>
                    <input type="number" class="form-control" id="due_amount" name="due_amount" readonly>
                </div>
                <!-- Modify the Submit button to dynamically change text based on whether a test ID is provided -->
                <button type="submit" class="btn" name="submit" id="submit_btn"><?php echo 'Update'; ?></button>

            </form>
        </div>
    </main>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch values and set them in the input fields
            $('#category').change(function() {
                var price = $(this).find('option:selected').data('price');
                var discount = parseFloat($('#discount').val()) || 0;
                var totalPrice = price - discount;
                $('#price').val(totalPrice.toFixed(2));

                var paidAmount = parseFloat($('#paid_amount').val()) || 0;
                var totalAmount = totalPrice - discount;
                $('#total_amount').val(totalAmount.toFixed(2));

                var dueAmount = totalAmount - paidAmount;
                $('#due_amount').val(dueAmount.toFixed(2));
            });

            // Function to update due amount based on paid amount
            $('#paid_amount').keyup(function() {
                var paidAmount = parseFloat($(this).val()) || 0;
                var totalAmount = parseFloat($('#total_amount').val()) || 0;
                var dueAmount = totalAmount - paidAmount;
                $('#due_amount').val(dueAmount.toFixed(2));
            });

            // Function to update total amount based on discount
            $('#discount').keyup(function() {
                var discount = parseFloat($(this).val()) || 0;
                var price = parseFloat($('#price').val()) || 0;
                var totalPrice = price - discount;
                $('#total_amount').val(totalPrice.toFixed(2));

                var paidAmount = parseFloat($('#paid_amount').val()) || 0;
                var dueAmount = totalPrice - paidAmount;
                $('#due_amount').val(dueAmount.toFixed(2));
            });

            // Fetch values and set them in the input fields when the page loads
            $('#category').trigger('change');
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