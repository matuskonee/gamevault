<?php

class AuthController {
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Register new user
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $error = null;

            // Validation
            if (empty($username) || empty($email) || empty($password)) {
                $error = 'All fields are required';
            } elseif (strlen($password) < 6) {
                $error = 'Password must be at least 6 characters';
            } elseif ($password !== $confirm_password) {
                $error = 'Passwords do not match';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Invalid email format';
            } elseif ($this->user->getByEmail($email)) {
                $error = 'Email already exists';
            }

            if (!$error) {
                if ($this->user->register($username, $email, $password)) {
                    $_SESSION['success'] = 'Registration successful! Please log in.';
                    header('Location: ' . SITE_URL . '/login');
                    exit;
                } else {
                    $error = 'Registration failed. Please try again.';
                }
            }

            return ['error' => $error];
        }

        return [];
    }

    /**
     * Login user
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $error = null;

            if (empty($email) || empty($password)) {
                $error = 'Email and password are required';
            } else {
                $user = $this->user->login($email, $password);
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    $_SESSION['success'] = 'Login successful!';
                    header('Location: ' . SITE_URL);
                    exit;
                } else {
                    $error = 'Invalid email or password';
                }
            }

            return ['error' => $error];
        }

        return [];
    }

    /**
     * Logout user
     */
    public function logout() {
        session_destroy();
        header('Location: ' . SITE_URL);
        exit;
    }
}
