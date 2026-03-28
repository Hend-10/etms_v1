<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->groupeModel = $this->model('Groupe');
        $this->logModel = $this->model('LogModel');
    }

    private function isAdmin() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/users/login');
            exit();
        }
        if($_SESSION['user_role'] != 'Administrateur') {
            header('location: ' . URLROOT . '/pages/index');
            exit();
        }
    }

    public function index() {
        $this->isAdmin(); 
        $users = $this->userModel->getUsers();
        $groupes = $this->groupeModel->getGroupes();
        $data = [
            'title' => 'Gestion des Utilisateurs',
            'users' => $users,
            'groupes' => $groupes
        ];
        $this->view('users/index', $data);
    }

    public function add() {
        $this->isAdmin(); 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'id_groupe' => trim($_POST['id_groupe']),
                'nom_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            if(empty($data['email'])) $data['email_err'] = 'Please enter email';
            if(empty($data['password'])) $data['password_err'] = 'Please enter password';

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->add($data)) {
                    $details = "Nouvel utilisateur créé: " . $data['prenom'] . " " . $data['nom'];
                    $this->logModel->addLog($_SESSION['user_id'], 'Création', $details);
                    
                    header('location: ' . URLROOT . '/users/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('Users/add', $data);
            }
        } else {
            $groupes = $this->groupeModel->getGroupes(); 
            $data = [
                'groupes' => $groupes,
                'nom' => '', 'prenom' => '', 'email' => '', 'password' => '', 'id_groupe' => ''
            ];
            $this->view('Users/add', $data);
        }
    }

    public function login() {
        if(isset($_SESSION['user_id'])){
            header('location: ' . URLROOT . '/pages/index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if(!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Aucun utilisateur trouvé.';
            }

            if(empty($data['email_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    
                    $this->logModel->addLog($_SESSION['user_id'], 'Connexion', 'L\'utilisateur s\'est connecté au système.');
                    
                } else {
                    $data['password_err'] = 'Mot de passe incorrect.';
                    $this->view('auth/login', $data);
                }
            } else {
                $this->view('auth/login', $data);
            }
        } else {
            $data = ['email' => '', 'password' => '', 'email_err' => '', 'password_err' => ''];
            $this->view('auth/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id_user;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_prenom'] = $user->prenom;
        $_SESSION['user_id_groupe'] = $user->id_groupe;
        $_SESSION['user_role'] = $user->nom_groupe; 
        
        header('location: ' . URLROOT . '/pages/index');
    }

    public function logout() {
        if(isset($_SESSION['user_id'])) {
            $this->logModel->addLog($_SESSION['user_id'], 'Déconnexion', 'L\'utilisateur s\'est déconnecté.');
        }

        $_SESSION = array();
        session_destroy();
        header('location: ' . URLROOT . '/users/login');
        exit();
    }

    public function profile() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
                
                $file = $_FILES['profile_image'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png'];

                if(in_array($ext, $allowed)) {
                    $newName = "user_" . $_SESSION['user_id'] . "_" . time() . "." . $ext;
                    $targetPath = "assets/img/photo/" . $newName;

                    if(move_uploaded_file($file['tmp_name'], $targetPath)) {
                        if($this->userModel->updateProfileImage($_SESSION['user_id'], $newName)) {
                            
                            $this->logModel->addLog($_SESSION['user_id'], 'Modification', 'Mise à jour de la photo de profil.');
                            
                            $_SESSION['user_photo'] = $newName;
                            flash('profile_message', 'Votre photo a été mise à jour !');
                        }
                    }
                } else {
                    flash('profile_message', 'Le format du fichier est invalide.', 'alert alert-danger');
                }
            }
            header('location: ' . URLROOT . '/users/profile');
        } else {
            $this->view('users/profile');
        }
    }
    public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'id_user' => $id,
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'email' => trim($_POST['email']),
            'id_groupe' => trim($_POST['id_groupe']),
            'password' => trim($_POST['password'])
        ];

        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            $data['password'] = null; 
        }

        if ($this->userModel->updateUser($data)) {
            $this->logModel->addLog($_SESSION['user_id'], 'Modification', "A modifié l'utilisateur ID: $id");
            header('location: ' . URLROOT . '/users/index');
        } else {
            die('Erreur lors de la mise à jour');
        }
    } else {
        $user = $this->userModel->getUserById($id);
        $groupes = $this->groupeModel->getGroupes();
        $data = ['user' => $user, 'groupes' => $groupes];
        $this->view('users/edit', $data);
    }
}
}