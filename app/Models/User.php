<?php

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // This replaces the logic from login.inc.php
    public function login($username, $password) {
        $sql = "SELECT * FROM utilisateur WHERE username = :username AND pass_user = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}