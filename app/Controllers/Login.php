<?php

class Login extends Controller {
    
    public function index() {
        // This shows the login form (the View)
        $this->view('auth/login');
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['pwd'];

            $userModel = $this->model('User');
            $user = $userModel->login($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                // Redirect to dashboard
                header('Location: ' . URLROOT . '/dashboard');
            } else {
                // Return to login with error
                $this->view('auth/login', ['error' => 'Identifiants incorrects']);
            }
        }
    }
}