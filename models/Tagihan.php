<?php
require_once 'BaseModel.php';

class Tagihan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'tagihan');
    }

    public function create($id_pesanan, $metode_bayar, $jumlah_bayar=0, $bukti_bayar = null, $status = 'tertunda', $isValid = 0) {
        $stmt = $this->pdo->prepare("INSERT INTO tagihan (id_pesanan, metode_bayar, jumlah_bayar, bukti_bayar, status, isvalid) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$id_pesanan, $metode_bayar, $jumlah_bayar, $bukti_bayar, $status, $isValid]);
    }

    public function update($id, $id_pesanan, $metode_bayar, $jumlah_bayar=0, $bukti_bayar = null, $status = 'tertunda', $isValid = 0) {
        $stmt = $this->pdo->prepare("UPDATE tagihan SET id_pesanan = ?, metode_bayar = ?, jumlah_bayar = ?, bukti_bayar = ?, status = ?, isValid = ? WHERE id = ?");
        return $stmt->execute([$id_pesanan, $metode_bayar, $jumlah_bayar, $bukti_bayar, $status, $isValid, $id]);
    }

    public function getByPesananId($id_pesanan) {
        $stmt = $this->pdo->prepare("SELECT * FROM tagihan WHERE id_pesanan = ?");
        $stmt->execute([$id_pesanan]);
        return $stmt->fetch();
    }
}
?>
    