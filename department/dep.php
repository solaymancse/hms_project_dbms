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

            *{
                margin: 0px;
                padding: 0px;
            }


            .m_container{
                height: 92vh;
                width: 100%;
                display: flex;
            }

            .s_bar{
                height: auto;
                width: auto;

            }

            .l_container{
                height: 100%;
                width: 100%;

                overflow: scroll;

                box-sizing: border-box;
                padding: 50px;
            }


            /* count css */

            .count-box{

                height: auto;
                width: 100%;

                margin-bottom: 50px;

                display: flex;
                align-items: center;
                justify-content: space-around;
                box-sizing: border-box;
                padding: 10px;


            }
            .doctor-count, .nurse-count{

                height: 100%;
                width: auto;
                background-color: gray;
                border-radius: 10px;

                box-shadow: 3px 3px 5px black;
                padding: 20px 2px;

                box-sizing: border-box;
                padding: 20px 20px;


            }

            .type_header{
                height: 30%;
                width: 100%;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            .type_count{

                height: 70%;
                width: 100%;

                display: flex;
                align-items: center;
                justify-content: center;

            }


            


            /* count css end */




</style>


  </head>



  <?php
  
            include'../connection.php';

            
            $input_search="";

            if(isset($_POST['search'])){
                $input_search= $_POST['input_search'];
            }
            $sql1= "SELECT * FROM department
            WHERE dep_id LIKE '%$input_search%' OR department_name LIKE '%$input_search%'
             ORDER BY dep_id ASC";

            $table= mysqli_query($conn, $sql1);

            $sql2= "SELECT COUNT(TYPE) as c1 FROM healthcare_provider
                            WHERE TYPE='Doctor'";

            $sql3= "SELECT COUNT(TYPE) as c2 FROM healthcare_provider
                            WHERE TYPE='Nurse'";

            $count_Doctor= mysqli_query($conn, $sql2);
            $count_Nurse= mysqli_query($conn, $sql3);

            $D= mysqli_fetch_assoc($count_Doctor);
            $N= mysqli_fetch_assoc($count_Nurse);


            $sql3= "SELECT d.department_name AS dep_name, COUNT(h.TYPE) AS t_doctor
                    FROM healthcare_provider AS h 
                    INNER JOIN department AS d 
                    ON h.dep_id = d.dep_id 
                    WHERE h.TYPE = 'Doctor' 
                    GROUP BY d.department_name
                    ORDER BY d.dep_id ASC;";
            
            $number_of_doctor = mysqli_query($conn, $sql3);

            $sql4 = "SELECT d.department_name AS dep_name, COUNT(h.TYPE) AS t_nurse
                    FROM healthcare_provider AS h 
                    INNER JOIN department AS d 
                    ON h.dep_id = d.dep_id 
                    WHERE h.TYPE = 'Nurse' 
                    GROUP BY d.department_name
                    ORDER BY d.dep_id ASC;";

            $number_of_nurse = mysqli_query($conn, $sql4);
  
  ?>



  <body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    
        include'dep_sidebar.php';
        include'../new_navbar.php';
    
    ?>


    <!-- main work start-->

    <main class="main">

    <div class="azaira"></div>


                <div class="count-box">

                        <div class="doctor-count">
                                <div class="type_header">
                                    <h3>Total Number of Doctors</h3>
                                </div><hr>
                                <div class="type_count">
                                    <h1><?php echo $D['c1'] ?></h1>
                                </div>
                        </div>

                        <div class="nurse-count">
                                <div class="type_header">
                                    <h3>Total Number of Nurses</h3>
                                </div><hr>
                                <div class="type_count">
                                    <h1><?php echo $N['c2'] ?></h1>
                                </div>

                        </div>         

                </div>

            
                <div class="container">

                    <?php

                        if(isset($_GET['msg'])){

                            $msg= $_GET['msg'];
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            '.$msg.'
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

                        }


                    ?>


                <div class="search_and-add_btn">
                <a href="add_dep.php" class="btn btn-dark mb-4">Add New</a>

                    <form action="" class="d-flex" method="post">
                        <input style="border: 1px solid black;" name="input_search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <input type="Submit" value="Search"  name="search" class="btn btn-dark" id="">
                    </a>
                    </form>

                </div>






                <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Department ID</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Number of Doctor</th>
                                <th scope="col">Number of Nurse</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>


                            <?php

                                while($row1= mysqli_fetch_assoc($table)){
                                    $row2 = mysqli_fetch_assoc($number_of_doctor);
                                    $row3 = mysqli_fetch_assoc($number_of_nurse);

                            ?>


                                        <tr>
                                            <td><?php echo $row1['dep_id'] ?></th>
                                            <td><?php echo $row1['department_name'] ?></th>
                                            <td><?php if(isset($row2['t_doctor'])){
                                                echo $row2['t_doctor'];
                                            }
                                            else{
                                                echo "0";
                                            } ?></th>

                                            <td><?php if(isset($row3['t_nurse'])){
                                                echo $row3['t_nurse'];
                                            }
                                            else{
                                                echo "0";
                                            } ?></th>
                                            <td>
                                            <a href="edit_dep.php?id=<?php echo $row1['dep_id']?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                            <a href="delete_dep.php?id=<?php echo $row1['dep_id']?>"  class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></a>

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