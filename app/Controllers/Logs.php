<?php
class Logs extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        
        $this->logModel = $this->model('LogModel');
    }

    public function index() {
        if($_SESSION['user_role'] !== 'Administrateur') {
            redirect('home');
        }

        $logs = $this->logModel->getLogs();

        $data = [
            'logs' => $logs
        ];

        $this->view('logs/index', $data);
    }
}