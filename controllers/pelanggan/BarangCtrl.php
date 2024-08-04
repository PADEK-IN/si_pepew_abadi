<?php
require_once '../models/Kategori.php';
require_once '../models/Barang.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 

class BarangCtrl {

    private $kategori;
    private $barang;

    public function __construct($pdo = null) {
        $this->barang = new Barang($pdo);
        $this->kategori = new Kategori($pdo);
    }

    // Daftar barang
    public function list() {
        $kategori = $this->kategori->getAll();
        $barangs = $this->barang->getAllWithCategory();
        renderView('pelanggan/barang/list', compact('barangs', 'kategori'));
    }

    // Daftar barang
    public function detail($id) {
        $kategori = $this->kategori->getAll();
        $barang = $this->barang->getByIdWithCategory($id);
        renderView('pelanggan/barang/detail', compact('barang', 'kategori'));
    }

}
?>
