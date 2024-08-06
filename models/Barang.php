<?php
require_once 'BaseModel.php';

class Barang extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'barang');
    }

    public function getAllWithCategory() {
        $stmt = $this->pdo->prepare("
            SELECT b.*, k.nama AS kategori_nama
            FROM barang b
            JOIN kategori k ON b.id_kategori = k.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIdWithCategory($id) {
        $stmt = $this->pdo->prepare("
            SELECT b.*, k.nama AS kategori_nama
            FROM barang b
            JOIN kategori k ON b.id_kategori = k.id
            WHERE b.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_kategori, $nama, $satuan, $harga, $stok, $deskripsi = null, $gambar = null, $berat = null) {
        $stmt = $this->pdo->prepare("
            INSERT INTO barang (id_kategori, nama, deskripsi, gambar, berat, satuan, harga, stok) 
            VALUES (:id_kategori, :nama, :deskripsi, :gambar, :berat, :satuan, :harga, :stok)
        ");
        $stmt->execute([
            'id_kategori' => $id_kategori,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar,
            'berat' => $berat,
            'satuan' => $satuan,
            'harga' => $harga,
            'stok' => $stok
        ]);
    }

    public function update($id, $id_kategori, $nama, $satuan, $harga, $stok, $deskripsi = null, $gambar = null, $berat = null) {
        $stmt = $this->pdo->prepare("
            UPDATE barang 
            SET id_kategori = :id_kategori, nama = :nama, deskripsi = :deskripsi, gambar = :gambar, berat = :berat, satuan = :satuan, harga = :harga, stok = :stok 
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'id_kategori' => $id_kategori,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar,
            'berat' => $berat,
            'satuan' => $satuan,
            'harga' => $harga,
            'stok' => $stok
        ]);
    }

    public function updateStok($id, $stok) {
        $stmt = $this->pdo->prepare("UPDATE barang SET stok = :stok WHERE id = :id");
        $stmt->execute(['id' => $id, 'stok' => $stok]);
    }

}
?>
