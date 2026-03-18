<?php
class Records extends Controller {
    public function __construct() {
    if(!isset($_SESSION['user_id'])){
        header('location: ' . URLROOT . '/users/login');
        exit();
    }
    $this->recordModel = $this->model('Record');
}

    public function index() {
        $records = $this->recordModel->getRecords();

        $data = [
            'title' => 'Historique des Données',
            'records' => $records
        ];

        $this->view('records/index', $data);
    }
     
}