<?php
require_once '../helpers/isAuth.php';
class PesananCtrl {
    private $isAuth;

    public function __construct() {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
    }

    public function store() {
        renderView('pelanggan/pesanan/store');
    }

    public function checkout() {
        renderView('pelanggan/pesanan/checkout');
    }

    // tagihan
    public function tagihan() {
        renderView('pelanggan/tagihan/list');
    }

}
