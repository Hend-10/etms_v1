<?php

class Database {
    private $host = "localhost";
    private $db_name = "etms"; 
    private $username = "root";   // Default XAMPP username
    private $password = "";       // Default XAMPP password is empty
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // This line tells PDO to throw an error if something goes wrong
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}