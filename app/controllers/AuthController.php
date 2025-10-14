<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/auth.php';

class AuthController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $user = $this->user->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header("Location: /");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        }

        include __DIR__ . '/../views/login.php';
    }

    public function register() {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Check if username already exists
            if ($this->user->findByUsername($username)) {
                $error = "Username already exists.";
            } else {
                if ($this->user->create($username, $name, $phone, $email, $password)) {
                    $success = "Registration successful! Redirecting to login...";
                    header("Refresh: 2; url=/login");
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
        }

        include __DIR__ . '/../views/register.php';
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
}
