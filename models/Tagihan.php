<?php
require_once 'BaseModel.php';

class Tagihan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'tagihan');
    }

    public function create($id_pesanan, $metode_bayar, $diskon = 0, $ppn = 0, $pph = 0, $total, $jumlah_bayar, $bukti_bayar = null, $status = 'tertunda') {
        $stmt = $this->pdo->prepare("INSERT INTO tagihan (id_pesanan, metode_bayar, diskon, ppn, pph, total, jumlah_bayar, bukti_bayar, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$id_pesanan, $metode_bayar, $diskon, $ppn, $pph, $total, $jumlah_bayar, $bukti_bayar, $status]);
    }

    public function update($id, $id_pesanan, $metode_bayar, $diskon = 0, $ppn = 0, $pph = 0, $total, $jumlah_bayar, $bukti_bayar = null, $status = 'tertunda') {
        $stmt = $this->pdo->prepare("UPDATE tagihan SET id_pesanan = ?, metode_bayar = ?, diskon = ?, ppn = ?, pph = ?, total = ?, jumlah_bayar = ?, bukti_bayar = ?, status = ? WHERE id = ?");
        return $stmt->execute([$id_pesanan, $metode_bayar, $diskon, $ppn, $pph, $total, $jumlah_bayar, $bukti_bayar, $status, $id]);
    }
}
?>
    