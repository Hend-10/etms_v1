<?php
class Seuils extends Controller {
    public function __construct() {
        $this->seuilModel = $this->model('Seuil');
        $this->capteurModel = $this->model('Capteur');
    }

    public function index() {
        $seuils = $this->seuilModel->getSeuils();
        $data = ['seuils' => $seuils];
        $this->view('seuils/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_cap' => $_POST['id_cap'],
                'min_t'  => $_POST['min_t'],
                'max_t'  => $_POST['max_t'],
                'min_h'  => $_POST['min_h'],
                'max_h'  => $_POST['max_h']
            ];
            if($this->seuilModel->addSeuil($data)) {
                header('location: ' . URLROOT . '/seuils/index');
            }
        } else {
            $capteurs = $this->capteurModel->getCapteurs();
            $data = ['capteurs' => $capteurs];
            $this->view('seuils/add', $data);
        }
    }
    public function edit($id) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'id_seuil' => $id,
            'min_t'    => trim($_POST['min_t']),
            'max_t'    => trim($_POST['max_t']),
            'min_h'    => trim($_POST['min_h']),
            'max_h'    => trim($_POST['max_h'])
        ];

        if($this->seuilModel->updateSeuil($data)) {
            header('location: ' . URLROOT . '/seuils/index');
        }
    } else {
        $seuil = $this->seuilModel->getSeuilById($id);

        $data = [
            'id_seuil' => $seuil->id_seuil,
            'Nom_cap'  => $seuil->Nom_cap,
            'min_t'    => $seuil->tmp_min,
            'max_t'    => $seuil->tmp_max,
            'min_h'    => $seuil->th_min,
            'max_h'    => $seuil->th_max
        ];

        $this->view('seuils/edit', $data);
    }
}
}