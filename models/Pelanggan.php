<?php
require_once 'BaseModel.php';

class Pelanggan extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pelanggan');
    }

    public function create($id_user, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan = null, $npwp = null, $no_telp, $foto = null) {
        $stmt = $this->pdo->prepare("INSERT INTO pelanggan (id_user, nama, jenis_kelamin, alamat, kota, kode_pos, pekerjaan, perusahaan, npwp, no_telp, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$id_user, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $no_telp, $foto]);
    }

    public function update($id, $id_user, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan = null, $npwp = null, $no_telp, $foto = null) {
        $stmt = $this->pdo->prepare("UPDATE pelanggan SET id_user = ?, nama = ?, jenis_kelamin = ?, alamat = ?, kota = ?, kode_pos = ?, pekerjaan = ?, perusahaan = ?, npwp = ?, no_telp = ?, foto = ? WHERE id = ?");
        return $stmt->execute([$id_user, $nama, $jenis_kelamin, $alamat, $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $no_telp, $foto, $id]);
    }
}
?>
