<?php 
    require_once "include/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome to your dashbaord <b><?php echo $user['full_name']; ?></b>
    <h3><a  style="color: red" href="?logout">Logout</a></h3>
</body>
</html>