<?php
class Emplacements extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/users/login');
            exit();
        }
        $this->emplacementModel = $this->model('Emplacement');
    }

    public function index() {
        $emplacements = $this->emplacementModel->getEmplacements();
        $data = ['emplacements' => $emplacements];
        $this->view('emplacements/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['nom' => trim($_POST['nom_emp'])];
            if($this->emplacementModel->addEmplacement($data)) {
                header('location: ' . URLROOT . '/emplacements/index');
            }
        } else {
            $this->view('emplacements/add');
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_emp' => $id,
                'nom' => trim($_POST['nom_emp'])
            ];
            if($this->emplacementModel->updateEmplacement($data)) {
                header('location: ' . URLROOT . '/emplacements/index');
            }
        } else {
            $emp = $this->emplacementModel->getEmplacementById($id);
            $data = [
                'id_emp' => $emp->id_emp,
                'nom_emp' => $emp->nom_emp
            ];
            $this->view('emplacements/edit', $data);
        }
    }

    public function delete($id) {
        if($this->emplacementModel->deleteEmplacement($id)) {
            header('location: ' . URLROOT . '/emplacements/index');
        }
    }
}