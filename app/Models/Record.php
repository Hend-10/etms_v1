<?php
class Record {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getRecords() {
        $this->db->query("SELECT * FROM records ORDER BY date_rec DESC");
        return $this->db->resultSet();
    }
    public function getRecordsBySensor($id_cap) {
        $this->db->query("SELECT * FROM records WHERE id_cap = :id_cap ORDER BY date_rec DESC");
        $this->db->bind(':id_cap', $id_cap);
        return $this->db->resultSet();
    }
}