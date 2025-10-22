<?php 
session_start();
 if(session_status() == PHP_SESSION_NONE) {
session_start();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Sign In</title>
</head>
<body class="container">
    <form action="" class="card card-body p-2 mt-3" method="POST">
        <?php 
            require_once "functions/database.php"; 
            require_once "functions/auth.php"; 
        ?>
        <div class="card-header">
            <h2 class="card-title">Login</h2>
            <p>Fill in the details below to log into your account.</p>
        </div>
        
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" required>
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>" id="">
        <br>
        <?php require_once "include/isset.php";  ?>
        <br>
        <input class="btn btn-primary" type="submit" name="login" value="Login.">
        </div>
    </form>
</body>
</html>