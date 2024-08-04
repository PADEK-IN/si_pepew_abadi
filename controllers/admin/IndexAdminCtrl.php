<?php
require_once '../helpers/isAuth.php';
require_once '../models/Admin.php';
require_once '../models/Pelanggan.php';

class IndexAdminCtrl {
    private $isAuth;
    private $admin;
    private $pelanggan;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isAdmin();
        $this->admin = new Admin($pdo);
        $this->pelanggan = new Pelanggan($pdo);
    }

    public function dashboard() {
        renderView('admin/dashboard/index');
    }

// user
    public function admin() {
        $adminUser = $this->admin->getAll();
        
        renderView('admin/user/list-admin', compact('adminUser'));
    }
    public function pelanggan() {
        $pelangganUser = $this->pelanggan->getAll();
        // var_dump($pelangganUser);
        renderView('admin/user/list-pelanggan', compact('pelangganUser'));
    }

    public function createAdmin() {
        renderView('admin/user/create-admin');
    }
    public function createPelanggan() {
        renderView('admin/user/create-pelanggan');
    }

    public function editAdmin() {
        renderView('admin/user/edit-admin');
    }
    public function editPelanggan() {
        renderView('admin/user/edit-pelanggan');
    }

}

