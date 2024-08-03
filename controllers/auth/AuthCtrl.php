<?php
//Pada controller, pemanggilannya anggap posisi berada di routes
require_once '../models/User.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 
class AuthCtrl {

    private $user;
    private $middleware;

    public function __construct($pdo = null) {
        $this->user = new User($pdo);
        $this->middleware = new MiddlewareAuth();
    }

    public function login() {
        $this->middleware->isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil dan sanitasi input
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

            // Validasi email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/login');
            }

            // Ambil data pengguna dari model
            $user = $this->user->getByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                setFlash('success', 'Login berhasil!');
                redirect('/admin/dashboard');
            } else {
                setFlash('error', 'Email atau password salah!');
                redirect('/login');
            }
        } else {
            renderView('auth/login');
        }

    }

    public function register() {
        $this->middleware->isAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/register');
            }

            if (empty($email) || empty($password)) {
                setFlash('error', 'Email dan password harus diisi!');
                redirect('/register');
            }

            // Validasi dan pendaftaran pengguna
            if ($this->user->getByEmail($email)) {
                setFlash('error', 'Email sudah terdaftar!');
                redirect('/register');
            }

            $success = $this->user->create($email, $password);
            
            if ($success) {
                setFlash('success', 'Registrasi berhasil! Silakan login.');
                redirect('/login');
            } else {
                setFlash('error', 'Registrasi gagal. Silakan coba lagi.');
                redirect('/register');
            }
        } else {
            renderView('auth/register');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        redirect('/login');
    }
}
