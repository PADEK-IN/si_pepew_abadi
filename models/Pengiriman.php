<?php
require_once 'BaseModel.php';

class Pengiriman extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pengiriman');
    }

    public function create($id_pesanan, $tanggal, $alamat, $bukti = null, $status = 'diproses') {
        $stmt = $this->pdo->prepare("INSERT INTO pengiriman (id_pesanan, tanggal, alamat, bukti, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$id_pesanan, $tanggal, $alamat, $bukti, $status]);
    }

    public function update($id, $id_pesanan, $tanggal, $alamat, $bukti = null, $status = 'diproses') {
        $stmt = $this->pdo->prepare("UPDATE pengiriman SET id_pesanan = ?, tanggal = ?, alamat = ?, bukti = ?, status = ? WHERE id = ?");
        return $stmt->execute([$id_pesanan, $tanggal, $alamat, $bukti, $status, $id]);
    }
}
?>
