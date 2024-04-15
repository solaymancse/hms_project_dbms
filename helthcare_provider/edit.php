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

                $f_name = $_POST['first_name'];
                $l_name = $_POST['Last_name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $type = $_POST['type'];
                $dob = $_POST['DOB'];
                $qual = $_POST['qualification'];
                $p_num = $_POST['phone_number'];
                $address = $_POST['address'];
                $dep_id = $_POST['dep_type'];

                $id = $_GET['id'];


                $sql = "UPDATE healthcare_provider SET 
                        first_name= '$f_name', Last_name= '$l_name',
                        email= '$email', gender= '$gender', type= '$type',
                        DOB= '$dob', qualification= '$qual', phone_number= '$p_num',
                        address= '$address', dep_id = '$dep_id' WHERE h_provider_id='$id';
                ";


                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $success_message = "successful";
                } else {
                    $success_message = "not insert";
                }
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


                <form action="add_new.php" method="post">
                    <div class="signup_logo">
                        <h1>Update</h1>
                    </div>

                    <div class="box">
                        <label for="">First Name: </label>
                        <input type="text" name="first_name">
                    </div>

                    <div class="box">
                        <label for="">Last name: </label>
                        <input type="text" name="Last_name">
                    </div>

                    <div class="box">
                        <label for="">E-mail: </label>
                        <input type="mail" name="email" require>
                    </div>
                    <div class="box">
                        <label for="">Gender: </label>
                        <select name="gender" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                    </div>

                    <div class="box">
                        <label for="">Type: </label>
                        <select name="type" id="">
                            <option value="Doctor">Doctor</option>
                            <option value="Nurse">Nurse</option>
                        </select>
                    </div>

                    <div class="box">
                        <label for="">Department: </label>
                        <select name="dep_type" id="">
                            <option value="1">Medicine</option>
                            <option value="2">Cardiology</option>
                            <option value="3">Neurology</option>
                        </select>
                    </div>

                    <div class="box">
                        <label for="">Date of Birth: </label>
                        <input type="date" name="DOB">
                    </div>

                    <div class="box">
                        <label for="">Qualification: </label>
                        <input type="text" name="qualification">
                    </div>

                    <div class="box">
                        <label for="">Phone Number: </label>
                        <input type="number" name="phone_number">
                    </div>

                    <div class="box">
                        <label for="">Address: </label>
                        <input type="text" name="address">
                    </div>

                    <div class="btn_box">
                        <input type="submit" value="Add" name="submit"><a href="healthcare_provider.php"></a>
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