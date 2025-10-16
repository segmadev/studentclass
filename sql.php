<?php
    class Database {
        // host, username, password, database_name
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "blog_website_db";
        private $db;
     
        public function __construct(){
            // connect to database
            try {
                $dbSettings = [
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES => false, // Use real prepared statements
                 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", // Proper character set
                ]; 
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8", 
                $this->username, $this->password, $dbSettings);
                echo "Connected successfully";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        // get all tables in database
        function getTables() {
           $tables = $this->db->prepare("SHOW TABLES");
           $tables->execute();
           var_dump($tables->fetchAll());
        }
        // insert into database
        function insertUser(array $userData) {
            $insertUser =  $this->db->prepare("INSERT INTO users (user_id, full_name, email, password_hash, role) VALUES (?, ?, ?, ?, ?)");
            if($insertUser->execute($userData)) {
                echo "User inserted successfully";
            } else {
                echo "Error inserting user";
        }
    }


    function updateUser($userID, array $userData) {
        $updateUser = $this->db->prepare("UPDATE users SET full_name = ?, email = ? where user_id = '$userID'");
        if($updateUser->execute($userData)) {
            echo "User updated successfully";
        } else {
            echo "Error updating user";
        }
    }

    // select all users  
    function getUsers() {

        $getUsers = $this->db->prepare("SELECT * FROM users");
        $getUsers->execute();
        var_dump($getUsers->fetchAll());
    }


    function getUsersbyEmail($email) {
        $getUsers = $this->db->prepare("SELECT * FROM users where email = ? and status = 'approved'");
        $getUsers->execute([$email]);
        var_dump($getUsers->fetchAll());
    }

    function approveUser($userID) {
        $approve = $this->db->prepare("UPDATE users SET status = 'approved' where user_id = '$userID'");
        if($approve->execute()) {
             echo "User approved successfully";
        } else {
            echo "Error approving user";
        }
    }
    //  delete user
    function deleteUser($userID) {
        $delete = $this->db->prepare("DELETE FROM users where user_id = ?");
        if($delete->execute([$userID])) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user";
        }
    }
        // close connection
        function __destruct() {
            $this->db = null;
        }
}

    $database = new Database();
    // $database->deleteUser(2);
    // $database->getUsersbyEmail("seyierin@gmail.com");
    // $database->getUsers();
    // $database->getTables();
    // $database->insertUser([2, "Erin Sryi", "erin@gmail.com", password_hash("12345", PASSWORD_DEFAULT), "user"]);
    // $database->updateUser(2, ["Erin Seyi", "seyierin@gmail.com"]);
    // $database->approveUser(2);