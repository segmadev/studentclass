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

    function signin() {
        // check if email and password are set and not empty
        if(!isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['email']) || empty($_POST['password'])) {
            echo "<div class='alert alert-danger'>Email and Password are required.</div>";
            return;
        }
        // fectch user data in database with the email
        $email = htmlspecialchars($_POST['email']);
        $user = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $user->execute([$email]);
        // if no record found then return incorrect email or password
        if($user->rowCount() == 0) {
            echo "<div class='alert alert-danger'>Incorrect email or password.</div>";
            return;
        }
        $user = $user->fetch(PDO::FETCH_ASSOC);
        // if record found then check if the password matches 
        if(!password_verify($_POST['password'], $user['password_hash'])) {
            //  if password not match retrun incorrect email or password
            echo "<div class='alert alert-danger'>Incorrect email or password.</div>";
            return;
        }
        if($user['status'] != 'approved') {
            echo "<div class='alert alert-danger'>Your account is not active, contact us.</div>";
            return;
        }
        // if password match then set session for user and redirect to index page or dashbord
        $this->setSession($user['user_id']);
        echo "<div class='alert alert-success'>Login successful. Redirecting...</div>";
        header("Location: dashboard.php");
    }

    function setSession($userID) {
        // start session if not started
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = bin2hex(random_bytes(16));
        $_SESSION['user_id'] = $userID;
        $_SESSION['token'] = $token;
        // update token in database
        $updateToken = $this->db->prepare("UPDATE users SET session_token = ? WHERE user_id = ?");
        $updateToken->execute([$token, $userID]);
        return true;
    }

    function logout() {
        // start session if not started
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['user_id'])) {
            $userID = htmlspecialchars($_SESSION['user_id']);
            // update token in database to empty
            $updateToken = $this->db->prepare("UPDATE users SET session_token = ? WHERE user_id = ?");
            $updateToken->execute(["", $userID]);
        }
        // unset all session variables
        session_unset();
        // destroy the session
        session_destroy();
        // redirect to signin page
        
        header("Location: signin.php");
        exit();
    }

    // function update user
    function updateuser() {
        // get user id and session token from session
        // check if id and sesssion token in database
        // get all user data from form
        // validate form data
        // update user data in database
        // show success or error message
    }
}
?>