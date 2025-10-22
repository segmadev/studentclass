<?php
    class Database {
        // host, username, password, database_name
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "blog_website_db";
        public $db;
     
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
                // echo "Connected successfully";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }


        // close connection
        function __destruct() {
            $this->db = null;
        }
    }
        ?>