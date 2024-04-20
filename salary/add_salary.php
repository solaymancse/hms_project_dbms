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



if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];


    $sql = "INSERT INTO notice (title, publish_date, description) VALUES ('$title', '$date', '$description')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // header("Location: healthcare_provider.php?msg=Record add successful");
        session_reset();
        $_SESSION['data'] = "Record add successful";
        echo "<script>window.location.href='all_notice.php' </script>";
        // $success_message = "successful";
    } else {
        $success_message = "not insert";
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
                <form id="survey-form">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label>current role</label>
                                <select id="dropdown" name="role" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <option value="student">Student</option>
                                    <option value="job">Full Time Job</option>
                                    <option value="learner">Full Time Learner</option>
                                    <option value="preferNo">Prefer not to say</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label>current role</label>
                                <select id="dropdown" name="role" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <option value="student">Student</option>
                                    <option value="job">Full Time Job</option>
                                    <option value="learner">Full Time Learner</option>
                                    <option value="preferNo">Prefer not to say</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Age <small>(optional)</small></label>
                                <input type="number" name="age" id="number" min="10" max="99" class="form-control" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>current role</label>
                                <select id="dropdown" name="role" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <option value="student">Student</option>
                                    <option value="job">Full Time Job</option>
                                    <option value="learner">Full Time Learner</option>
                                    <option value="preferNo">Prefer not to say</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Would you recommend survey to a friend?</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" value="Definitely" name="customRadioInline1" class="custom-control-input" checked="">
                                    <label class="custom-control-label" for="customRadioInline1">Definitely</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" value="Maybe" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Maybe</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" value="Not sure" name="customRadioInline1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline3">Not sure</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>This survey useful yes or no?</label>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="yes" value="yes" id="yes" checked="">
                                    <label class="custom-control-label" for="yes">Yes</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="no" value="no" id="no">
                                    <label class="custom-control-label" for="no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Leave Message</label>
                                <textarea id="comments" class="form-control" name="comment" placeholder="Enter your comment here..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Survey</button>
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