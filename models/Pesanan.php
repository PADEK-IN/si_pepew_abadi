<?php
require_once 'BaseModel.php';

class Pesanan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pesanan');
    }

    public function create($id_pelanggan, $metode_kirim, $ppn, $net, $ongkir=0) {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (id_pelanggan, metode_kirim, ongkir, ppn, total) VALUES (?, ?, ?, ?, ?)");	
        $stmt->execute([$id_pelanggan, $metode_kirim, $ongkir, $ppn, $net]);

        // Mengembalikan ID dari pesanan yang baru dibuat
        return $this->pdo->lastInsertId();
    }

    public function update($id_pelanggan, $metode_kirim, $ppn, $net, $ongkir=0) {
        $stmt = $this->pdo->prepare("UPDATE pesanan SET id_pelanggan = ?, metode_kirim = ?, ongkir = ?, ppn = ?, total = ? WHERE id = ?");
        return $stmt->execute([$id_pelanggan, $metode_kirim, $ongkir, $ppn, $net]);
    }
}
?>
