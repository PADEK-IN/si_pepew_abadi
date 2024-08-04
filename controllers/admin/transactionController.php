<?php
require_once '../helpers/isAuth.php';
require_once '../models/Pengiriman.php';

class transactionController{
    private $isAuth;
    private $pengiriman;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();  
        $this->isAuth->isAdmin();
        $this->pengiriman = new Pengiriman($pdo);
    }

    // pemesanan
        public function pemesanan() {
            renderView('admin/pemesanan/list');
        }
        public function detailPemesanan($id) {
            renderView('admin/pemesanan/detail', ['id' => $id]);
        }

    // tagihan
        public function tagihan() {
            renderView('admin/tagihan/list');
        }
        public function detailTagihan($id) {
            renderView('admin/tagihan/detail', ['id' => $id]);
        }
        public function validasiTagihan() {
            renderView('admin/tagihan/validasi');
        }

    // pengiriman
        public function pengiriman() {
            $pengiriman = $this->pengiriman->getAll();

            renderView('admin/pengiriman/list', compact('pengiriman'));
        }
        public function detailPengiriman($id) {
            renderView('admin/pengiriman/detail', ['id' => $id]);
        }
}