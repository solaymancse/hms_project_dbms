<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Employee</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/res.css">
    <link rel="stylesheet" href="../structure_css.css">

<style>

 *{
        margin: 0px;
        padding: 0px;
    }


   
    .l_container{
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
            $salary = $_POST['salary'];
            $type = $_POST['e_type'];
            $dob = $_POST['e_DOB'];
            $qual = $_POST['e_qualification'];
            $p_num = $_POST['e_phone_number'];


            $sql = "INSERT INTO employee(first_name, last_name,email, salary, DOB, e_type , qualification, phone_number) VALUES
                        ('$f_name', '$l_name', '$email' ,$salary, '$dob' , '$type', '$qual', '$p_num')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // header("Location: healthcare_provider.php?msg=Record add successful");
                session_reset();
                $_SESSION['data'] = "Record add successful";
                echo "<script>window.location.href='all_employee.php' </script>";
                $success_message = "successful";
            } else {
                $success_message = "not insert";
                $success_message = "Error: " . mysqli_error($conn); 
            }
        }

?>



  </head>



  <body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    
        include'../new_sidebar.php';
        include'../new_navbar.php';
    
    ?>


    <!-- main work start-->

    <main class="main">

    <div class="azaira"></div>

            <div class="l_container">

           
                <form action="" method="post">

                    <div class="row g-2 mb-3">
                        <div class="col-md ">
                            <div class="form-floating">
                                <input name="f_name" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                                <label for="floatingTextarea">First Name</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input name="l_name" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                                <label for="floatingTextarea">Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="e_mail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="salary" type="number" class="form-control" id="floatingInput" placeholder="Salary">
                        <label for="floatingInput">Salary</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="e_DOB" type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email Date of Birth</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="e_type" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="Receptionist">Receptionist</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Laboratorist">Laboratorist</option>
                        </select>

                        <label for="floatingSelect">Select Designation</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="e_qualification" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Qualification</label>
                    </div>

                    <div class="form-floating mb-5">
                            <input name="e_phone_number" type="number" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">
                            <label for="floatingTextarea">Employee Phone Number</label>
                    </div>
                    <div class="form-floating">
                            <a href="all_employee.php" ><input name="submit" type="submit" class="btn btn-dark mb-4"></a>
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