<?php
require_once '../helpers/isAuth.php';

class IndexAdminCtrl {
    private $isAuth;

    public function __construct() {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isAdmin();
    }

    public function dashboard() {
        renderView('admin/dashboard/index');
    }

// user
    public function admin() {
        renderView('admin/user/list-admin');
    }
    public function pelanggan() {
        renderView('admin/user/list-pelanggan');
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

