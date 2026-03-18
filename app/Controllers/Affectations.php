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
                header('location: ' . URLROOT . '/affectations');
            }
        }
    }

    public function delete($id) {
        if($this->affectationModel->deleteAffectation($id)) {
            header('location: ' . URLROOT . '/affectations');
        }
    }
}