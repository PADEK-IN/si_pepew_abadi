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
        $stmt = $this->pdo->prepare("SELECT keranjang.id, keranjang.jumlah, barang.id as id_barang ,barang.nama, barang.stok, barang.harga, barang.gambar FROM keranjang JOIN barang ON keranjang.id_barang = barang.id WHERE keranjang.id_user = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetchAll();
    }

    public function getByIdBarangAndIdUser($id_barang, $id_user) {
        $stmt = $this->pdo->prepare("SELECT * FROM keranjang WHERE id_barang = ? AND id_user = ?");
        $stmt->execute([$id_barang, $id_user]);
        return $stmt->fetch();
    }

    public function getByIdKeranjangAndIdUserWithBarang($id, $id_user) {
        $stmt = $this->pdo->prepare("SELECT keranjang.id, keranjang.jumlah, barang.id as id_barang, barang.nama, barang.stok, barang.harga, barang.gambar FROM keranjang JOIN barang ON keranjang.id_barang = barang.id WHERE keranjang.id = ? AND keranjang.id_user = ?");
        $stmt->execute([$id, $id_user]);
        return $stmt->fetch();
    }

    public function getByIdsWithBarang($id_user, $ids) {
        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        $ids = array_map('intval', $ids);
        $sql = "
            SELECT keranjang.id, keranjang.jumlah, barang.id as id_barang, barang.nama, barang.stok, barang.harga, barang.gambar 
            FROM keranjang 
            JOIN barang ON keranjang.id_barang = barang.id 
            WHERE keranjang.id_user = ? 
            AND keranjang.id IN ($placeholders)
        ";

        $stmt = $this->pdo->prepare($sql);
        $params = array_merge([$id_user], $ids);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
