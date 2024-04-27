<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 - Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./login.css">
</head>

<?php
session_start();
include '../connection.php'; // Include your database connection file

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User is authenticated as admin, redirect to structure.php
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../structure.php');
        exit();
    } else {
        // Invalid credentials, show error message
        echo "Invalid username or password";
    }
}
?>

<body class="main-bg">
    <!-- Login Form -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">


                            <div class="mb-4">
                                <label for="username" class="form-label">Username/Email</label>
                                <input type="email" name="email" class="form-control" id="username" />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" />
                            </div>
                            <div class="mb-4">
                                <input type="checkbox" class="form-check-input" id="remember" />
                                <label for="remember" class="form-label">Remember Me</label>
                            </div>
                            <?php

                            if (isset($_GET['data'])) {

                                $msg = $_GET['data'];
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
' . $msg . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                            }


                            ?>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn text-light main-bg">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>