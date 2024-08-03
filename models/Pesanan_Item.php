<?php
require_once 'BaseModel.php';

class PesananItems extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pesanan_items');
    }

    public function create($id_pesanan, $id_barang, $jumlah) {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan_items (id_pesanan, id_barang, jumlah) VALUES (?, ?, ?)");
        return $stmt->execute([$id_pesanan, $id_barang, $jumlah]);
    }

    public function update($id, $id_pesanan, $id_barang, $jumlah) {
        $stmt = $this->pdo->prepare("UPDATE pesanan_items SET id_pesanan = ?, id_barang = ?, jumlah = ? WHERE id = ?");
        return $stmt->execute([$id_pesanan, $id_barang, $jumlah, $id]);
    }
}
?>
