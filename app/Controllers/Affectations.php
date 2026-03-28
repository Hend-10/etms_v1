<?php
class Affectations extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/users/login');
            exit();
        }

        if($_SESSION['user_role'] != 'Administrateur') {
            header('location: ' . URLROOT . '/pages/index');
            exit();
        }

        $this->affectationModel = $this->model('Affectation');
        $this->capteurModel = $this->model('Capteur');
        $this->emplacementModel = $this->model('Emplacement');
        $this->logModel = $this->model('LogModel'); 
    }

    public function index() {
        $affectations = $this->affectationModel->getAffectations();
        $capteurs = $this->capteurModel->getCapteurs();
        $emplacements = $this->emplacementModel->getEmplacements();

        $data = [
            'affectations' => $affectations,
            'capteurs' => $capteurs,
            'emplacements' => $emplacements
        ];

        $this->view('affectations/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_cap' => trim($_POST['id_cap']),
                'id_emp' => trim($_POST['id_emp'])
            ];

            if($this->affectationModel->addAffectation($data)) {
                $this->logModel->addLog($_SESSION['user_id'], 'Affectation', "Capteur ID " . $data['id_cap'] . " affecté à l'emplacement ID " . $data['id_emp']);
                header('location: ' . URLROOT . '/affectations');
            }
        }
    }

    public function delete($id) {
        if($this->affectationModel->deleteAffectation($id)) {
            $this->logModel->addLog($_SESSION['user_id'], 'Désaffectation', "Suppression de l'affectation ID : " . $id);
            header('location: ' . URLROOT . '/affectations');
        }
    }
}