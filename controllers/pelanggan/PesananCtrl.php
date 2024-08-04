<?php
require_once '../helpers/isAuth.php';
class PesananCtrl {
    private $isAuth;

    public function __construct() {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
    }

    // pemesanan
    public function keranjang() {
        renderView('pelanggan/pesanan/list');
    }

    public function checkout() {
        renderView('pelanggan/pesanan/checkout');
    }

    // tagihan
    public function tagihan() {
        renderView('pelanggan/tagihan/list');
    }

}
