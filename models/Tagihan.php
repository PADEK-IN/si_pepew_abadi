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

    public function getByIdPelangganWithDetailPesanan($id_pelanggan) {
        $stmt = $this->pdo->prepare("SELECT * FROM tagihan WHERE id_pesanan IN (SELECT id FROM pesanan WHERE id_pelanggan = ?) ORDER BY created_at DESC");
        $stmt->execute([$id_pelanggan]);
        $tagihan = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tagihan as $key => $value) {
            // Get the pesanan details
            $stmt = $this->pdo->prepare("SELECT metode_kirim, ppn, total FROM pesanan WHERE id = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pesanan = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pesanan'] = $pesanan;

            $stmt = $this->pdo->prepare("SELECT id_barang, jumlah FROM pesanan_items WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $item_pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($item_pesanan as $k => $v) {
                $stmt = $this->pdo->prepare("SELECT id, nama, harga, satuan, berat FROM barang WHERE id = ?");
                $stmt->execute([$v['id_barang']]);
                $barang = $stmt->fetch(PDO::FETCH_ASSOC);
                $item_pesanan[$k]['barang'] = $barang;
            }
            $tagihan[$key]['item_pesanan'] = $item_pesanan;
        }
        return $tagihan;
    }
}
?>
    