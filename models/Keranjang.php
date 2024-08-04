<?php
require_once 'BaseModel.php';

class Keranjang extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'keranjang');
    }

    public function create($id_user, $id_barang, $jumlah) {
        $stmt = $this->pdo->prepare("INSERT INTO keranjang (id_user, id_barang, jumlah) VALUES (?, ?, ?)");
        return $stmt->execute([$id_user, $id_barang, $jumlah]);
    }

    public function update($id, $jumlah) {
        $stmt = $this->pdo->prepare("
            UPDATE keranjang 
            SET jumlah = :jumlah 
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'jumlah' => $jumlah,
        ]);
    }

    public function getAllWithBarang($id_user) {
        $stmt = $this->pdo->prepare("SELECT keranjang.id, keranjang.jumlah, barang.nama, barang.harga, barang.gambar FROM keranjang JOIN barang ON keranjang.id_barang = barang.id WHERE keranjang.id_user = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetchAll();
    }

    public function getByIdBarangAndIdUser($id_barang, $id_user) {
        $stmt = $this->pdo->prepare("SELECT * FROM keranjang WHERE id_barang = ? AND id_user = ?");
        $stmt->execute([$id_barang, $id_user]);
        return $stmt->fetch();
    }
}
?>
