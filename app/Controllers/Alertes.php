<?php
class Alertes extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/users/login');
            exit();
        }
        $this->alerteModel = $this->model('Alerte');
    }

    public function index() {
        $alerts = $this->alerteModel->getAlerts();
        $data = [
            'alerts' => $alerts
        ];
        $this->view('alertes/index', $data);
    }

    public function delete($id) {
        if($this->alerteModel->deleteAlerte($id)) {
            header('location: ' . URLROOT . '/alertes/index');
        }
    }
    public function sync() {
    if($this->alerteModel->syncOldAlerts()) {
        header('location: ' . URLROOT . '/alertes/index');
    }
}
}