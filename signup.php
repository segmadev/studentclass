<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body class="container">
    <form action="" class="card card-body p-2 mt-3" method="POST">
        <?php 
            require_once "functions/database.php"; 
            require_once "functions/auth.php"; 
        ?>
        <div class="card-header">
            <h2 class="card-title">Register</h2>
        </div>
        <div class="col-6 rounded p-3 shadow">
            <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" placeholder="Enter Full Name" value="<?php if(isset($_POST['fullname'])) { echo $_POST['fullname']; } ?>" name="fullname" required>
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" required>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>" id="">
        <label for="password">Confrim Password</label>
        <input type="password" name="confrim_password" class="form-control" id="">
        <br>
        <?php require_once "include/isset.php";  ?>
        <br>
        <input class="btn btn-primary" type="submit" name="register" value="Register Account">
        </div>
    </form>
</body>
</html>