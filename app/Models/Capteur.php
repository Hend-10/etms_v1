<?php
class Capteur {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCapteurs() {
        $this->db->query("SELECT * FROM capteur ORDER BY daj DESC");
        return $this->db->resultSet();
    }

    // ADD THIS METHOD HERE
    public function getCapteurById($id) {
        $this->db->query("SELECT * FROM capteur WHERE id_cap = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addCapteur($data) {
        $this->db->query("INSERT INTO capteur (Nom_cap, id_user, daj) VALUES (:nom, :id_user, NOW())");
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':id_user', $_SESSION['user_id']);
        return $this->db->execute();
    }

    public function deleteCapteur($id) {
        $this->db->query("DELETE FROM capteur WHERE id_cap = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function updateCapteur($data) {
        $this->db->query("UPDATE capteur SET Nom_cap = :nom WHERE id_cap = :id");
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':id', $data['id_cap']);
        return $this->db->execute();
    }
}