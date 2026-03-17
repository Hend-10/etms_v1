<?php

class Home extends Controller {
    public function index() {
        $db = new Database();
        $status = "Connecté"; 

        $data = [
            'title' => 'Tableau de bord',
            'db_status' => $status,
            'userPrenom' => 'Admin',
            'userNom' => 'User',
            'userProfilImg' => 'default.png' 
        ];

        $this->view('index', $data);
    }
}