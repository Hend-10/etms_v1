<?php
class Affectation {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all affectations with sensor and location names
    public function getAffectations() {
        $this->db->query("SELECT a.*, c.Nom_cap, e.nom_emp 
                          FROM affectation_cap a
                          JOIN capteur c ON a.id_cap = c.id_cap
                          JOIN emplacement e ON a.id_emp = e.id_emp
                          ORDER BY a.daj DESC");
        return $this->db->resultSet();
    }

    // Add new affectation
    public function addAffectation($data) {
        $this->db->query("INSERT INTO affectation_cap (id_cap, id_emp, daj) VALUES (:id_cap, :id_emp, NOW())");
        $this->db->bind(':id_cap', $data['id_cap']);
        $this->db->bind(':id_emp', $data['id_emp']);
        return $this->db->execute();
    }

    // Delete affectation
    public function deleteAffectation($id) {
        $this->db->query("DELETE FROM affectation_cap WHERE id_affec = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}