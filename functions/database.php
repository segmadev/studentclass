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

        // select
        function select($from, $where, $params,  $select = "*", $method = "fetch"){
            $query = $this->db->prepare("SELECT $select FROM $from WHERE $where");
            $query->execute($params);
            switch($method){
                case 'fetch':
                case 'detail':
                case 'single':
                    return $query->fetch(PDO::FETCH_ASSOC);
                case 'all':
                case 'fetchAll':
                case 'multiple':
                case 'list':
                case 'rows':
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                case 'rowCount':
                case 'count':
                    return $query->rowCount();
                default:
                    return $query->rowCount();
            }
        }
        // insert
        function insert($into, $values) {
            $placeholders = rtrim(str_repeat('?, ', count($values)), ', ');
            // var_dump($values);
            $columns = "";
            $data = [];
            foreach($values as $key => $value){
                $columns .= "$key, ";
                $data[] = $value;
            }
            $columns = rtrim($columns, ', ');
             $query = $this->db->prepare("INSERT INTO $into ($columns) VALUES ($placeholders)");
            return $query->execute($data);
        }
        // update
        // delete


        // close connection
        function __destruct() {
            $this->db = null;
        }


    }
        ?>