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

    <link rel="stylesheet" href="../css/doctor.css">




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
                  z-index: 100000;

                  margin-top: 100px;
                  position: absolute;
              }


</style>



    </style>



  </head>




  <?php
  
        use LDAP\Result;

        include'../connection.php'; 
        $sql= "SELECT first_name, last_name, qualification,type, email, gender 
                    FROM healthcare_provider";

        $result = mysqli_query($conn, $sql);      

?>


  <body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <?php
   
                include'../new_navbar.php';
                include'../new_sidebar.php';
   
   ?>

    <!-- main work start-->

    <main class="main">


                <div class="l_container">

                    <h1 class="h_bar">List of Doctor</h1>
                    
                    <div class="card-design">

                        <?php

                            while($row= mysqli_fetch_assoc($result)){

                                if($row['type']=='Doctor'){
                        
                        ?>


                            <div class="card">

                                <img src="../photos/male.png" alt="">

                                <div class="description">

                                    <h3 class="d-font">Name: <?php echo $row['first_name'] . " " . $row['last_name']?> </h3>
                                    <h3 class="d-font">Qualification: <?php echo $row['qualification'] ?></h3>
                                    <h3 class="d-font">Gender: <?php echo $row['gender'] ?></h3>
                                    <h3 class="d-font">Email: <?php echo $row['email'] ?></h3>

                                </div>

                            </div>

                        <?php

                                }

                                }

                            include '../footer.php';
                        ?>


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