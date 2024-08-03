<?php
require_once '../models/Kategori.php';
require_once '../models/Barang.php';
require_once '../helpers/flash.php';
class IndexGuestCtrl {
    private $barang;

    public function __construct($pdo = null) {
        $this->barang = new Barang($pdo);
    }

    public function guest() {
        $barangs = $this->barang->getAllWithCategory();
        renderView('guest/index', compact('barangs'));
    }

    public function barang() {
        $barangs = $this->barang->getAllWithCategory();
        renderView('guest/list-produk', compact('barangs'));
    }

    public function detail($id) {
        $barang = $this->barang->getByIdWithCategory($id);
        renderView('guest/detail-produk', compact('barang'));
    }
}
