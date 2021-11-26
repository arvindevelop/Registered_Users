<?php

    class Post{
        
        private $conn;
        private $table = 'users';

        //user properties
        public $id;
        public $name;
        public $email;
        public $mobile;
        public $password;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }

        //getting users from database
        public function read(){
            $query = 'SELECT * from users';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;

        }
    }

?>