<?php
require_once 'BaseModel.php';

class Pesanan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pesanan');
    }

    public function create($id_pelanggan, $metode_kirim, $ppn, $net) {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (id_pelanggan, metode_kirim, ppn, total) VALUES (?, ?, ?, ?)");	
        $stmt->execute([$id_pelanggan, $metode_kirim, $ppn, $net]);

        // Mengembalikan ID dari pesanan yang baru dibuat
        return $this->pdo->lastInsertId();
    }

    public function update($id_pelanggan, $metode_kirim, $ppn, $net) {
        $stmt = $this->pdo->prepare("UPDATE pesanan SET id_pelanggan = ?, metode_kirim = ?, ppn = ?, total = ? WHERE id = ?");
        return $stmt->execute([$id_pelanggan, $metode_kirim, $ppn, $net]);
    }
}
?>
