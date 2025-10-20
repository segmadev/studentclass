<?php 
    class Auth extends Database {
        function registerUser() {
            // vaildate form data
            if(!isset($_POST['fullname']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confrim_password'])
                || empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confrim_password'])) {
                echo "<div class='alert alert-danger'>All fields are required.</div>";
                return;
            }
            if($_POST['password'] !== $_POST['confrim_password']) {
                echo "<div class='alert alert-danger'>Passwords do not match.</div>";
                return;
            }
            // check password strength
            if(strlen($_POST['password']) < 6) {
                echo "<div class='alert alert-danger'>Password must be at least 6 characters long.</div>";
                return;
            }
            // hash password
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // check email in database 
            $email = htmlspecialchars($_POST['email']);
            $check = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $check->execute([$email]);
            // if(count($check->fetchAll()) > 0) {
            //     echo "<div class='alert alert-danger'>Email already exists.</div>";
            //     return; 
            // }
            if($check->rowCount() > 0) {
                echo "<div class='alert alert-danger'>Email already exists.</div>";
                return;
            }
            // insert user into database
            $userData = [
                htmlspecialchars($_POST['fullname']),
                $email,
                $passwordHash
            ];
            
             $insertUser = $this->db->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
            if($insertUser->execute($userData)) {
                echo "<div class='alert alert-success'>User registered successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error registering user.</div>";
        }
    }
}
?>