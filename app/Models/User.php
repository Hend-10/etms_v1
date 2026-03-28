<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getUsers() {
        
        $this->db->query("SELECT u.*, g.nom_groupe 
                        FROM utilisateur u 
                        LEFT JOIN groupe g ON u.id_groupe = g.id_groupe 
                        ORDER BY u.nom ASC");
        return $this->db->resultSet();
    }

    public function add($data) {
        $this->db->query("INSERT INTO utilisateur (nom, prenom, email, password, id_groupe) VALUES(:nom, :prenom, :email, :password, :id_groupe)");
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id_groupe', $data['id_groupe']);
        
        return $this->db->execute();
    }
    public function getUserById($id) {
        $this->db->query("SELECT * FROM utilisateur WHERE id_user = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function update($data) {
        $this->db->query("UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, id_groupe = :id_groupe WHERE id_user = :id");
        $this->db->bind(':id', $data['id']);    
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id_groupe', $data['id_groupe']);
        return $this->db->execute();
    }


    public function delete($id) {
        $this->db->query("DELETE FROM utilisateur WHERE id_user = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM utilisateur WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function login($email, $password) {
    $this->db->query('SELECT u.*, g.nom_groupe 
                      FROM utilisateur u 
                      JOIN groupe g ON u.id_groupe = g.id_groupe 
                      WHERE u.email = :email');
    
    $this->db->bind(':email', $email);
    $row = $this->db->single();

    if ($row && password_verify($password, $row->password)) {
        return $row;
    } else {
        return false;
    }
}
public function updateProfileImage($id, $image) {
    $this->db->query('UPDATE utilisateur SET photo = :photo WHERE id_user = :id');
    $this->db->bind(':photo', $image);
    $this->db->bind(':id', $id);
    return $this->db->execute();
}
public function addLog($id_user, $action, $details = "") {
    $this->db->query("INSERT INTO logs (id_user, action, details) VALUES (:id_user, :action, :details)");
    $this->db->bind(':id_user', $id_user);
    $this->db->bind(':action', $action);
    $this->db->bind(':details', $details);
    return $this->db->execute();
}
public function updateUser($data) {
    if ($data['password'] != null) {
        $this->db->query("UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, id_groupe=:id_groupe, password=:password WHERE id_user=:id_user");
        $this->db->bind(':password', $data['password']);
    } else {
        $this->db->query("UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, id_groupe=:id_groupe WHERE id_user=:id_user");
    }

    $this->db->bind(':nom', $data['nom']);
    $this->db->bind(':prenom', $data['prenom']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':id_groupe', $data['id_groupe']);
    $this->db->bind(':id_user', $data['id_user']);
    
    return $this->db->execute();
}
}