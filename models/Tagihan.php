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
            $stmt = $this->pdo->prepare("SELECT metode_kirim, ppn, total, ongkir FROM pesanan WHERE id = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pesanan = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pesanan'] = $pesanan;

            $stmt = $this->pdo->prepare("SELECT id, tanggal, status FROM pengiriman WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pengiriman = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pengiriman'] = $pengiriman;

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

    public function getAllWithPesananAndPelangganAndPengiriman() {
        $stmt = $this->pdo->prepare("SELECT * FROM tagihan ORDER BY created_at DESC");
        $stmt->execute();
        $tagihan = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tagihan as $key => $value) {
            // Get the pesanan details
            $stmt = $this->pdo->prepare("SELECT metode_kirim, ppn, total, ongkir FROM pesanan WHERE id = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pesanan = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pesanan'] = $pesanan;

            $stmt = $this->pdo->prepare("SELECT id_barang, jumlah FROM pesanan_items WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $item_pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Get the pelanggan details
            $stmt = $this->pdo->prepare("SELECT nama, email, alamat FROM pelanggan WHERE id = (SELECT id_pelanggan FROM pesanan WHERE id = ?)");
            $stmt->execute([$value['id_pesanan']]);
            $pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pelanggan'] = $pelanggan;

            // Get the pengiriman details
            $stmt = $this->pdo->prepare("SELECT * FROM pengiriman WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pengiriman = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pengiriman'] = $pengiriman;
        }
        return $tagihan;
    }

    public function getByIdWithPesananAndPelanggan($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tagihan WHERE id = ?");
        $stmt->execute([$id]);
        $tagihan = $stmt->fetch(PDO::FETCH_ASSOC);

        // Get the pesanan details
        $stmt = $this->pdo->prepare("SELECT metode_kirim, ppn, total FROM pesanan WHERE id = ?");
        $stmt->execute([$tagihan['id_pesanan']]);
        $pesanan = $stmt->fetch(PDO::FETCH_ASSOC);
        $tagihan['pesanan'] = $pesanan;

        $stmt = $this->pdo->prepare("SELECT id_barang, jumlah FROM pesanan_items WHERE id_pesanan = ?");
        $stmt->execute([$tagihan['id_pesanan']]);
        $item_pesanan = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($item_pesanan as $key => $value) {
            $stmt = $this->pdo->prepare("SELECT id, nama, harga, satuan, berat FROM barang WHERE id = ?");
            $stmt->execute([$value['id_barang']]);
            $barang = $stmt->fetch(PDO::FETCH_ASSOC);
            $item_pesanan[$key]['barang'] = $barang;
        }
        $tagihan['item_pesanan'] = $item_pesanan;

        // Get the pelanggan details
        $stmt = $this->pdo->prepare("SELECT nama, email, alamat FROM pelanggan WHERE id = (SELECT id_pelanggan FROM pesanan WHERE id = ?)");
        $stmt->execute([$tagihan['id_pesanan']]);
        $pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);
        $tagihan['pelanggan'] = $pelanggan;

        return $tagihan;
    }

    public function validate($id, $status, $isValid) {
        $stmt = $this->pdo->prepare("UPDATE tagihan SET status = ?, isValid = ? WHERE id = ?");
        return $stmt->execute([$status, $isValid, $id]);
    }

    public function reject($id, $status, $isValid) {
        $stmt = $this->pdo->prepare("UPDATE tagihan SET status = ?, isValid = ? WHERE id = ?");
        return $stmt->execute([$status, $isValid, $id]);
    }

    public function qtyCountByStatus($status) {
        $stmt = $this->pdo->prepare("SELECT SUM(jumlah_bayar) FROM tagihan WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchColumn();
    }

    public function count() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tagihan");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getByDateRangeWithPesananAndPelangganAndPengiriman() {
        $startDate = filter_input(INPUT_POST, 'startDate', FILTER_DEFAULT);
        $endDate = filter_input(INPUT_POST, 'endDate', FILTER_DEFAULT);

        $stmt = $this->pdo->prepare("SELECT * FROM tagihan WHERE created_at BETWEEN ? AND ? ORDER BY created_at DESC");
        $stmt->execute([$startDate, $endDate]);
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

            // Get the pelanggan details
            $stmt = $this->pdo->prepare("SELECT nama, email, alamat FROM pelanggan WHERE id = (SELECT id_pelanggan FROM pesanan WHERE id = ?)");
            $stmt->execute([$value['id_pesanan']]);
            $pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pelanggan'] = $pelanggan;

            // Get the pengiriman details
            $stmt = $this->pdo->prepare("SELECT * FROM pengiriman WHERE id_pesanan = ?");
            $stmt->execute([$value['id_pesanan']]);
            $pengiriman = $stmt->fetch(PDO::FETCH_ASSOC);
            $tagihan[$key]['pengiriman'] = $pengiriman;
        }
        return $tagihan;
    }

    public function getTotalPendapatanPerBulan() {
        $stmt = $this->pdo->prepare("SELECT MONTH(created_at) AS bulan, SUM(jumlah_bayar) AS total FROM tagihan WHERE status = 'lunas' AND YEAR(created_at) = YEAR(CURRENT_DATE()) GROUP BY MONTH(created_at)");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
    