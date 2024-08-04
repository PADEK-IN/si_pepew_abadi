<?php
require_once 'BaseModel.php';

class Admin extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'admin');
    }

    public function create($email, $nama, $jenis_kelamin, $alamat, $no_telp, $foto = null, $isValid = 1) {
        $stmt = $this->pdo->prepare("INSERT INTO admin (email, nama, jenis_kelamin, alamat, no_telp, foto, isValid) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$email, $nama, $jenis_kelamin, $alamat, $no_telp, $foto, $isValid]);
    }

    public function update($id, $email, $nama, $jenis_kelamin, $alamat, $no_telp, $foto = null, $isValid = 1) {
        $stmt = $this->pdo->prepare("UPDATE admin SET email = ?, nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ?, foto = ?, isValid = ? WHERE id = ?");
        return $stmt->execute([$email, $nama, $jenis_kelamin, $alamat, $no_telp, $foto, $isValid, $id]);
    }

    public function getByUserEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>
