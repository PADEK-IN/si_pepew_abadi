<?php
require_once 'BaseModel.php';

class Pelanggan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pelanggan');
    }

    public function create($email, $nama, $jenis_kelamin, $alamat, $no_telp, $kota = null, $kode_pos = null, $pekerjaan = null, $perusahaan = null, $npwp = null, $foto = null) {
        $stmt = $this->pdo->prepare("INSERT INTO pelanggan (email, nama, jenis_kelamin, alamat, kota, kode_pos, pekerjaan, perusahaan, npwp, no_telp, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$email, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $no_telp, $foto]);
    }

    public function update($id, $email, $nama, $jenis_kelamin, $alamat, $no_telp, $kota = null, $kode_pos = null, $pekerjaan = null, $perusahaan = null, $npwp = null, $foto = null) {
        $stmt = $this->pdo->prepare("UPDATE pelanggan SET email = ?, nama = ?, jenis_kelamin = ?, alamat = ?, kota = ?, kode_pos = ?, pekerjaan = ?, perusahaan = ?, npwp = ?, no_telp = ?, foto = ? WHERE id = ?");
        return $stmt->execute([$email, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $no_telp, $foto, $id]);
    }

    public function getByUserEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM pelanggan WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

}
?>
