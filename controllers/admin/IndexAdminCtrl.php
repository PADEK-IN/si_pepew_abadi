<?php
require_once '../helpers/isAuth.php';
require_once '../models/User.php';
require_once '../models/Admin.php';
require_once '../models/Pelanggan.php';

class IndexAdminCtrl {
    private $isAuth;
    private $user;
    private $admin;
    private $pelanggan;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isAdmin();
        $this->user = new User($pdo);
        $this->admin = new Admin($pdo);
        $this->pelanggan = new Pelanggan($pdo);
    }

    public function dashboard() {
        renderView('admin/dashboard/index');
    }

// adminData
    public function admin() {
        $adminUser = $this->admin->getAll();
        
        renderView('admin/user/list-admin', compact('adminUser'));
    }
    
    public function createAdmin() {
        renderView('admin/user/create-admin');
    }

    public function storeAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
            $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
            $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
            $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/admin/create/admin');
            }

            if (empty($email) || empty($password)) {
                setFlash('error', 'Email dan password harus diisi!');
                redirect('/admin/create/admin');
            }

            if(empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
                setFlash('error', 'Data harus diisi dengan lengkap!');
                redirect('/admin/create/admin');
            }

            // Validasi dan pendaftaran admin
            if ($this->user->getByEmail($email) || $this->admin->getByUserEmail($email)) {
                setFlash('error', 'Email sudah terdaftar!');
                redirect('/admin/create/admin');
            }

            if (!validatePhoneNumber($no_telp)) {
                setFlash('error', 'Nomor telepon tidak valid!. Contoh: +6281234567890');
                redirect('/admin/create/admin');
            }

            try {
                $this->user->create($email, $password, 'admin');
                $this->admin->create($email, $nama, $jenis_kelamin, $alamat, $no_telp);
                setFlash('success', 'Registrasi berhasil! Silakan login.');
                redirect('/admin/admin-list');
            } catch (\Exception $th) {
                setFlash('error', 'Registrasi gagal. Silakan coba lagi.'.$th->getMessage());
                redirect('/admin/create/admin');
            }
        }
    }
    
    public function editAdmin() {
        renderView('admin/user/edit-admin');
    }

// pelangganData
    public function createPelanggan() {
        renderView('admin/user/create-pelanggan');
    }
    public function pelanggan() {
        $pelangganUser = $this->pelanggan->getAll();
        renderView('admin/user/list-pelanggan', compact('pelangganUser'));
    }
    public function editPelanggan() {
        renderView('admin/user/edit-pelanggan');
    }

}

