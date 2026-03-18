<?php
class Seuil {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getSeuils() {
        $this->db->query("SELECT seuil.*, capteur.Nom_cap 
                        FROM seuil 
                        JOIN capteur ON seuil.id_cap = capteur.id_cap");
        return $this->db->resultSet();
    }

   public function addSeuil($data) {
    $this->db->query("INSERT INTO seuil (id_cap, tmp_min, tmp_max, th_min, th_max) 
                      VALUES (:id_cap, :min_t, :max_t, :min_h, :max_h)");
    
    $this->db->bind(':id_cap', $data['id_cap']);
    $this->db->bind(':min_t', $data['min_t']);
    $this->db->bind(':max_t', $data['max_t']);
    $this->db->bind(':min_h', $data['min_h']);
    $this->db->bind(':max_h', $data['max_h']);
    
    return $this->db->execute();
}
    public function getSeuilById($id) {
        $this->db->query("SELECT seuil.*, capteur.Nom_cap 
                        FROM seuil 
                        JOIN capteur ON seuil.id_cap = capteur.id_cap 
                        WHERE id_seuil = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
public function updateSeuil($data) {
    $this->db->query("UPDATE seuil SET 
                      tmp_min = :min_t, 
                      tmp_max = :max_t, 
                      th_min = :min_h, 
                      th_max = :max_h 
                      WHERE id_seuil = :id");
                      
    $this->db->bind(':id', $data['id_seuil']);
    $this->db->bind(':min_t', $data['min_t']);
    $this->db->bind(':max_t', $data['max_t']);
    $this->db->bind(':min_h', $data['min_h']);
    $this->db->bind(':max_h', $data['max_h']);
    
    return $this->db->execute();
}
}