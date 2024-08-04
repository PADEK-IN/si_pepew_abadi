<?php
require_once '../models/Kategori.php';
require_once '../models/Barang.php';
require_once '../helpers/flash.php';
class IndexGuestCtrl {
    private $kategori;
    private $barang;

    public function __construct($pdo = null) {
        $this->barang = new Barang($pdo);
        $this->kategori = new Kategori($pdo);
    }

    public function guest() {
        $barangs = $this->barang->getAllWithCategory();
        renderView('guest/index', compact('barangs'));
    }

    public function barang() {
        $kategori = $this->kategori->getAll();
        $barangs = $this->barang->getAllWithCategory();
        renderView('guest/list-barang', compact('barangs', 'kategori'));
    }

    public function detail($id) {
        $kategori = $this->kategori->getAll();
        $barang = $this->barang->getByIdWithCategory($id);
        renderView('guest/detail-barang', compact('barang', 'kategori'));
    }
}
