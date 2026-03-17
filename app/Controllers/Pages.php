<?php
class Pages extends Controller {
    public function index() {
        if(!isset($_SESSION['user_id'])){
            header('location: ' . URLROOT . '/users/login');
            exit();
        }

        $data = [
            'title' => 'Tableau de bord'
        ];

        $this->view('pages/index', $data);
    }
}