<?php
class Groupe {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getGroupes() {
        $this->db->query("SELECT * FROM groupe");
        return $this->db->resultSet();
    }
}