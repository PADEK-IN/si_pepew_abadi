<?php
require_once 'BaseModel.php';

class Pengiriman extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pengiriman');
    }

    public function create($id_pesanan, $tanggal, $alamat, $bukti = null, $status = 'terkirim') {
        $stmt = $this->pdo->prepare("INSERT INTO pengiriman (id_pesanan, tanggal, alamat, bukti, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$id_pesanan, $tanggal, $alamat, $bukti, $status]);
    }

    public function update($id, $id_pesanan, $tanggal, $alamat, $bukti = null, $status = 'diproses') {
        $stmt = $this->pdo->prepare("UPDATE pengiriman SET id_pesanan = ?, tanggal = ?, alamat = ?, bukti = ?, status = ? WHERE id = ?");
        return $stmt->execute([$id_pesanan, $tanggal, $alamat, $bukti, $status, $id]);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE pengiriman SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function getAllWithTagihanAndPesananAndPelanggan() {
        $stmt = $this->pdo->prepare("SELECT * FROM pengiriman ORDER BY created_at DESC");
        $stmt->execute();
        $pengiriman = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($pengiriman as $key => $value) {
            // Get the tagihan details
            $stmt = $this->pdo->prepare("SELECT * FROM tagihan WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $tagihan = $stmt->fetch(PDO::FETCH_ASSOC);
            $pengiriman[$key]['tagihan'] = $tagihan;

            // Get the pesanan details
            $stmt = $this->pdo->prepare("SELECT metode_kirim, ppn, total FROM pesanan WHERE id = ?");
            $stmt->execute([$tagihan['id_pesanan']]);
            $pesanan = $stmt->fetch(PDO::FETCH_ASSOC);
            $pengiriman[$key]['pesanan'] = $pesanan;

            // Get the pelanggan details
            $stmt = $this->pdo->prepare("SELECT * FROM pelanggan WHERE id = (SELECT id_pelanggan FROM pesanan WHERE id = ?)");
            $stmt->execute([$tagihan['id_pesanan']]);
            $pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);
            $pengiriman[$key]['pelanggan'] = $pelanggan;

            $stmt = $this->pdo->prepare("SELECT id_barang, jumlah FROM pesanan_items WHERE id_pesanan = ?");
            $stmt->execute([$tagihan['id_pesanan']]);
            $item_pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($item_pesanan as $k => $v) {
                $stmt = $this->pdo->prepare("SELECT id, nama, harga, satuan, berat FROM barang WHERE id = ?");
                $stmt->execute([$v['id_barang']]);
                $barang = $stmt->fetch(PDO::FETCH_ASSOC);
                $item_pesanan[$k]['barang'] = $barang;
            }
            $pengiriman[$key]['item_pesanan'] = $item_pesanan;
        }
        return $pengiriman;
    }
}
?>
