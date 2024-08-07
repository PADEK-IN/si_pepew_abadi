<?php
require_once '../helpers/isAuth.php';
require_once '../models/Tagihan.php';
require_once '../models/Pengiriman.php';

class transactionController{
    private $isAuth;
    private $tagihan; 
    private $pengiriman;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();  
        $this->isAuth->isAdmin();
        $this->tagihan = new Tagihan($pdo);
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
            try {
                $listTagihan = $this->tagihan->getAllWithPesananAndPelanggan();

                // console_log($listTagihan);
                renderView('admin/tagihan/list', compact('listTagihan'));
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/home');
            }
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