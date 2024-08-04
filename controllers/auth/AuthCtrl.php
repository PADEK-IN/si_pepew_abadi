<?php
//Pada controller, pemanggilannya anggap posisi berada di routes
require_once '../models/User.php';
require_once '../models/Pelanggan.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 
require_once '../helpers/validatePhone.php'; 
class AuthCtrl {

    private $user;
    private $pelanggan;
    private $middleware;

    public function __construct($pdo = null) {
        $this->user = new User($pdo);
        $this->pelanggan = new Pelanggan($pdo);
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
            $profile = $this->pelanggan->getByUserEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                $_SESSION['nama'] = $profile['nama'];
                $_SESSION['foto'] = $profile['foto'];
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
            $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
            $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
            $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/register');
            }

            if (empty($email) || empty($password)) {
                setFlash('error', 'Email dan password harus diisi!');
                redirect('/register');
            }

            if(empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
                setFlash('error', 'Data harus diisi dengan lengkap!');
                redirect('/register');
            }

            // Validasi dan pendaftaran pengguna
            if ($this->user->getByEmail($email) || $this->pelanggan->getByUserEmail($email)) {
                setFlash('error', 'Email sudah terdaftar!');
                redirect('/register');
            }

            if (!validatePhoneNumber($no_telp)) {
                setFlash('error', 'Nomor telepon tidak valid!. Contoh: +6281234567890');
                redirect('/register');
            }

            $createUser = $this->user->create($email, $password);
            $createPelanggan = $this->pelanggan->create($email, $nama, $jenis_kelamin, $alamat, $no_telp);
            
            if ($createUser && $createPelanggan) {
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
