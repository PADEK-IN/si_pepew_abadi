<?php
require_once 'BaseModel.php';

class Pesanan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pesanan');
    }

    public function create($id_admin, $id_pelanggan, $metode_kirim) {
        $stmt = $this->pdo->prepare("INSERT INTO pesanan (id_admin, id_pelanggan, metode_kirim) VALUES (?, ?, ?)");
        return $stmt->execute([$id_admin, $id_pelanggan, $metode_kirim]);
    }

    public function update($id, $id_admin, $id_pelanggan, $metode_kirim) {
        $stmt = $this->pdo->prepare("UPDATE pesanan SET id_admin = ?, id_pelanggan = ?, metode_kirim = ? WHERE id = ?");
        return $stmt->execute([$id_admin, $id_pelanggan, $metode_kirim, $id]);
    }
}
?>
