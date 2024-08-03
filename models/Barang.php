<?php
require_once 'BaseModel.php';

class Barang extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'barang');
    }

    public function create($id_kategori, $nama, $deskripsi = null, $gambar = null, $berat, $satuan, $harga, $stok) {
        $stmt = $this->pdo->prepare("INSERT INTO barang (id_kategori, nama, deskripsi, gambar, berat, satuan, harga, stok) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$id_kategori, $nama, $deskripsi, $gambar, $berat, $satuan, $harga, $stok]);
    }

    public function update($id, $id_kategori, $nama, $deskripsi = null, $gambar = null, $berat, $satuan, $harga, $stok) {
        $stmt = $this->pdo->prepare("UPDATE barang SET id_kategori = ?, nama = ?, deskripsi = ?, gambar = ?, berat = ?, satuan = ?, harga = ?, stok = ? WHERE id = ?");
        return $stmt->execute([$id_kategori, $nama, $deskripsi, $gambar, $berat, $satuan, $harga, $stok, $id]);
    }
}
?>
