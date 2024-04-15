<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div>
            <h1>Doctor Register</h1>
        </div>
        <form class="form" action="insert_data.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" name="address">
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>