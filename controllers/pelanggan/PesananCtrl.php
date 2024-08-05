<?php
require_once '../helpers/isAuth.php';
require_once '../models/Barang.php';
require_once '../models/Pesanan.php';
require_once '../models/Pelanggan.php';
class PesananCtrl {
    private $isAuth;
    private $barang;
    private $pesanan;
    private $pelanggan;

    public function __construct($pdo=null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
        $this->barang = new Barang($pdo);
        $this->pesanan = new Pesanan($pdo);
        $this->pelanggan = new Pelanggan($pdo);
    }

    public function store() {
        $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_DEFAULT);
        $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);

        $pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
        $alamat = $pelanggan['alamat'];
        $barang = $this->barang->getById($id_barang);

        renderView('pelanggan/pesanan/create', compact('barang', 'alamat', 'jumlah'));
    }

    public function checkout() {
        renderView('pelanggan/pesanan/checkout');
    }

    // tagihan
    public function tagihan() {
        renderView('pelanggan/tagihan/list');
    }

}
