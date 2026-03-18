<?php
class Capteurs extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
        header('location: ' . URLROOT . '/users/login');
        exit();
    }

    if($_SESSION['user_role'] != 'Administrateur') {
        header('location: ' . URLROOT . '/pages/index');
        exit();
    }
        $this->capteurModel = $this->model('Capteur');
    }

    public function index() {
        $capteurs = $this->capteurModel->getCapteurs();
        $data = ['capteurs' => $capteurs];
        $this->view('capteurs/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['nom' => trim($_POST['nom'])];
            if($this->capteurModel->addCapteur($data)) {
                header('location: ' . URLROOT . '/capteurs/index');
            }
        } else {
            $this->view('capteurs/add');
        }
    }

    public function delete($id) {
        if($this->capteurModel->deleteCapteur($id)) {
            header('location: ' . URLROOT . '/capteurs/index');
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_cap' => $id,
                'nom' => trim($_POST['nom'])
            ];

            if($this->capteurModel->updateCapteur($data)) {
                header('location: ' . URLROOT . '/capteurs/index');
            }
        } else {
            $capteur = $this->capteurModel->getCapteurById($id);
            
            $data = [
                'id_cap' => $capteur->id_cap,
                'Nom_cap' => $capteur->Nom_cap
            ];

            $this->view('capteurs/edit', $data);
        }
    }
}