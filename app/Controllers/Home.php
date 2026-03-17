<?php

class Home extends Controller {
public function index() {
    $db = new Database();
    $status = $db->connect() ? "Connecté" : "Erreur de connexion";

    // This data array is what the View uses to fill in the blanks
    $data = [
        'title' => 'Tableau de bord',
        'db_status' => $status,
        'userPrenom' => 'Admin', // Temporary test data
        'userNom' => 'User',
        'userProfilImg' => 'default.png' // Make sure this exists in assets/img/photo/
    ];

    $this->view('index', $data);
}
}