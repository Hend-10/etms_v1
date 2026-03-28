<?php
class LogModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getLogs() {
        $this->db->query("SELECT logs.*, CONCAT(utilisateur.prenom, ' ', utilisateur.nom) as nom_utilisateur 
                          FROM logs 
                          JOIN utilisateur ON logs.id_user = utilisateur.id_user 
                          ORDER BY logs.date_action DESC");
        return $this->db->resultSet();
    }
    public function addLog($id_user, $action, $details) {
    $this->db->query("INSERT INTO logs (id_user, action, details, date_action) 
                      VALUES (:id_user, :action, :details, NOW())");
    $this->db->bind(':id_user', $id_user);
    $this->db->bind(':action', $action);
    $this->db->bind(':details', $details);
    
    return $this->db->execute();
    }
}