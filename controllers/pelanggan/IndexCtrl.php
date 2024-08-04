<?php
require_once '../models/Pelanggan.php';
require_once '../models/User.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 
class IndexCtrl {
    private $isAuth;
    private $user;
    private $pelanggan;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();
        $this->user = new User($pdo);
        $this->pelanggan = new Pelanggan($pdo);
        $this->isAuth->isUser();
    }

    public function guest() {
        renderView('guest/index');
    }

    public function home() {
        renderView('pelanggan/home/index');
    }

    public function profile() {
        $user = $this->user->getById($_SESSION['user']['id']);
        $profile = $this->pelanggan->getByUserId($_SESSION['user']['id']);
        renderView('pelanggan/home/profile', compact('user'));
    }

}
