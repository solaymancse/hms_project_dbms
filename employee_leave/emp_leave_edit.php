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
    <link rel="stylesheet" href="../css/res.css">
    <link rel="stylesheet" href="../structure_css.css">

    <style>

     *{
            margin: 0px;
            padding: 0px;
        }


       
        .l_container{
          margin-top: 100px;
        }
        .l_container form {
            background-color: skyblue;
            box-shadow: 5px 5px 10px black;

            box-sizing: border-box;
            padding: 30px;
            border-radius: 10px;


        }


        #success_message{

                height: auto;
                width: 100%;
                text-align: center;
                color: green;


        }
  /* main work css end */





    </style>



  </head>

  <?php


include '../connection.php';



            $success_message = "";
            if (isset($_POST['submit'])) {

                $employee_id = $_POST['employee_id'];
                $health_provider_id = $_POST['health_provider_id'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
                $leave_reason = $_POST['leave_reason'];

                $id = $_GET['id'];


                $sql = "UPDATE employee_leave SET 
                employee_id = '$employee_id', h_provider_id = '$health_provider_id',
                start_date = '$start_time', end_date = '$end_time', leave_reason = '$leave_reason'
                WHERE id = '$id'";
        


                $result = mysqli_query($conn, $sql);

                if ($result) {
                    session_reset();
                    $_SESSION['data'] = "Record add successful";
                    echo "<script>window.location.href='employee_leave.php' </script>";
                    $success_message = "successful";
                } else {
                    $success_message = "not insert";
                }
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id']; // Again, validate and sanitize this input
                $sql = "SELECT * FROM employee_leave WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            }

?>





  <body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <?php
    
            include'../new_navbar.php';
            include'../new_sidebar.php';
    
    ?>

    <!-- main work start-->

    <main class="main">

          <div class="azaira"></div>

          <div class="l_container">


          <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
                    <div class="signup_logo">
                        <h1>Update Employee leave</h1>
                    </div>

                    <div class="box">
                        <label for="">Employee ID: </label>
                        <input type="text" name="employee_id" value="<?php echo $row['employee_id']; ?>">
                    </div>

                    <div class="box">
                        <label for="">Health Provider Id </label>
                        <input type="text" name="health_provider_id" value="<?php echo $row['h_provider_id']; ?>">
                    </div>

                    <div class="box">
                        <label for="">Start Time: </label>
                        <input type="date" name="start_time" value="<?php echo $row['start_date']; ?>" >
                    </div>
                    <div class="box">
                        <label for="">End Time: </label>
                        <input type="date" name="end_time" value="<?php echo $row['end_date']; ?>">
                    </div>
                

                    <div class="box">
                        <label for="">Leave Reason: </label>
                        <input type="text" name="leave_reason" value="<?php echo $row['leave_reason']; ?>">
                    </div>

                    <div class="btn_box">
                        <input type="submit" value="Update" name="submit"><a href="healthcare_provider.php"></a>
                    </div>

                    <div class="box">
                        
                        <label id="success_message"><i class="fa-solid fa-check" style="color: #178901; margin: 0px 15px"></i>
                            <?php echo $success_message ?>
                        </label>
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