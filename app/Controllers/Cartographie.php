<?php
class Cartographie extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/users/login');
            exit();
        }
        $this->cartoModel = $this->model('Carto');
        $this->empModel = $this->model('Emplacement'); 
    }

    public function index() {
        $pdfs = $this->cartoModel->getPdfs();
        $emplacements = $this->empModel->getEmplacements();

        $data = [
            'title' => 'Gestion de Cartographie',
            'pdfs' => $pdfs,
            'emplacements' => $emplacements
        ];

        $this->view('cartographie/index', $data);
    }

    public function upload() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // 1. Handle the file
            $fileName = time() . '_' . $_FILES['pdf_file']['name'];
            $targetDir = '../public/uploads/pdf/';
            
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            if(move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetDir . $fileName)) {
                
                // 2. Identify the connected user safely
                $loggedUser = 'Unknown User';
                if(isset($_SESSION['user_name'])) $loggedUser = $_SESSION['user_name'];
                elseif(isset($_SESSION['nom'])) $loggedUser = $_SESSION['nom'];
                elseif(isset($_SESSION['user_id'])) $loggedUser = "User ID: " . $_SESSION['user_id'];

                $data = [
                    'emp_id' => $_POST['emp_id'],
                    'file_name' => $fileName,
                    'user' => $loggedUser
                ];

                if($this->cartoModel->addPdf($data)) {
                    header('location: ' . URLROOT . '/cartographie');
                }
            }
        }
    }

    public function delete($id, $fileName) {
        $path = '../public/uploads/pdf/' . $fileName;
        if(file_exists($path)) unlink($path);
        
        if($this->cartoModel->deletePdf($id)) {
            header('location: ' . URLROOT . '/cartographie');
        }
    }
}