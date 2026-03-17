<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->groupeModel = $this->model('Groupe');
    }

    public function index() {
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'id_groupe' => trim($_POST['id_groupe']),
            'email_err' => '' 
        ];

        if($this->userModel->findUserByEmail($data['email'])) {
            $data['email_err'] = 'Cet email est déjà utilisé.';
        }

        if(empty($data['email_err'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($this->userModel->add($data)) {
                flash('user_message', 'Utilisateur ajouté !');
                header('location: ' . URLROOT . '/users');
            } else {
                die('Erreur interne.');
            }
        } else {
            $data['groupes'] = $this->groupeModel->getGroupes();
            $data['title'] = 'Ajouter un utilisateur';
            
            flash('user_message', $data['email_err'], 'alert alert-danger');
            $this->view('users/add', $data);
        }

    } else {
        $data = [
            'title' => 'Ajouter un utilisateur',
            'groupes' => $this->groupeModel->getGroupes()
        ];
        $this->view('users/add', $data);
    }
}
public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'email' => trim($_POST['email']),
            'id_groupe' => trim($_POST['id_groupe'])
        ];

        if ($this->userModel->update($data)) {
            flash('user_message', 'Les informations de ' . $data['prenom'] . ' ont été mises à jour.');
            
            header('location: ' . URLROOT . '/users');
        } else {
            die('Quelque chose s\'est mal passé lors de la mise à jour.');
        }

    } else {
        $user = $this->userModel->getUserById($id);
        
        $groupes = $this->groupeModel->getGroupes();
        if(!$user) {
            header('location: ' . URLROOT . '/users');
            exit();
        }

        $data = [
            'title' => 'Modifier l\'utilisateur',
            'user' => $user,
            'groupes' => $groupes
        ];

        $this->view('users/edit', $data);
    }
}

 public function delete($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($this->userModel->delete($id)) {
            flash('user_message', 'Utilisateur supprimé avec succès.', 'alert alert-danger');
            header('location: ' . URLROOT . '/users');
        } else {
            die('Erreur lors de la suppression');
        }
    } else {
        header('location: ' . URLROOT . '/users');
    }
}
public function login() {
        // REDIRECT IF ALREADY LOGGED IN
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

            // Validate Email exists
            if(!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Aucun utilisateur trouvé avec cet email.';
            }

            // Proceed if no email error
            if(empty($data['email_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Mot de passe incorrect.';
                    $this->view('auth/login', $data);
                }
            } else {
                $this->view('auth/login', $data);
            }

        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('auth/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id_user;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_prenom'] = $user->prenom;
        $_SESSION['user_id_groupe'] = $user->id_groupe;
        
        header('location: ' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_nom']);
        session_destroy();
        header('location: ' . URLROOT . '/users/login');
    }
}