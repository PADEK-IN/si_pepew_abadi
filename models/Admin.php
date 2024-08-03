<?php
require_once 'BaseModel.php';

class Admin extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'admin');
    }

    public function create($id_user, $nama, $jenis_kelamin, $alamat, $no_telp, $foto = null, $isValid = 0) {
        $stmt = $this->pdo->prepare("INSERT INTO admin (id_user, nama, jenis_kelamin, alamat, no_telp, foto, isValid) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$id_user, $nama, $jenis_kelamin, $alamat, $no_telp, $foto, $isValid]);
    }

    public function update($id, $id_user, $nama, $jenis_kelamin, $alamat, $no_telp, $foto = null, $isValid = 0) {
        $stmt = $this->pdo->prepare("UPDATE admin SET id_user = ?, nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ?, foto = ?, isValid = ? WHERE id = ?");
        return $stmt->execute([$id_user, $nama, $jenis_kelamin, $alamat, $no_telp, $foto, $isValid, $id]);
    }
}
?>
