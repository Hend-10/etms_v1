<?php
class Emplacement {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getEmplacements() {
        $this->db->query("SELECT * FROM emplacement ORDER BY daj DESC");
        return $this->db->resultSet();
    }

    public function getEmplacementById($id) {
        $this->db->query("SELECT * FROM emplacement WHERE id_emp = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addEmplacement($data) {
        $this->db->query("INSERT INTO emplacement (nom_emp, daj) VALUES (:nom, NOW())");
        $this->db->bind(':nom', $data['nom']);
        return $this->db->execute();
    }

    public function updateEmplacement($data) {
        $this->db->query("UPDATE emplacement SET nom_emp = :nom WHERE id_emp = :id");
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':id', $data['id_emp']);
        return $this->db->execute();
    }

    public function deleteEmplacement($id) {
        $this->db->query("DELETE FROM emplacement WHERE id_emp = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}