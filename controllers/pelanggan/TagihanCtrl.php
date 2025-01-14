<?php
require_once '../helpers/isAuth.php';
require_once '../models/Barang.php';
require_once '../models/Pesanan.php';
require_once '../models/Pesanan_Item.php';
require_once '../models/Pelanggan.php';
require_once '../models/Tagihan.php';
require_once '../models/Pengiriman.php';
require_once '../helpers/flash.php';
require_once '../helpers/redirect.php';
require_once '../helpers/imageHandler.php';

class TagihanCtrl {
    private $isAuth;
    private $pelanggan; 
    private $tagihan; 
    private $pengiriman; 
    private $imageHelper;

    public function __construct($pdo=null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
        $this->tagihan = new Tagihan($pdo);
        $this->pengiriman = new Pengiriman($pdo);
        $this->pelanggan = new Pelanggan($pdo);
        $this->imageHelper = new ImageHandler();
    }

    public function tagihan() {
        try {
            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            $detailTagihan = $this->tagihan->getByIdPelangganWithDetailPesanan($id_pelanggan);
            return renderView('pelanggan/tagihan/list', compact('detailTagihan'));
        } catch (\Exception $e) {
            setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
            return redirect('/barang');
        }
    }

    public function pembayaran() {
        $pesananId = filter_input(INPUT_POST, 'id_pesanan', FILTER_SANITIZE_NUMBER_INT);
        $jumlah_bayar = filter_input(INPUT_POST, 'jumlah_bayar', FILTER_SANITIZE_NUMBER_INT);
        $net = filter_input(INPUT_POST, 'net', FILTER_SANITIZE_NUMBER_INT);
        $gambar = $_FILES['bukti'] ?? null;
        if ($gambar && $gambar['error'] === UPLOAD_ERR_OK) {
            $result = $this->imageHelper->uploadImageBukti($gambar);
            if (!$result['success']) {
                setFlash('error', $result['message']);
                return renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
            }
            $gambarFileName = $result['filename'];
        } else {
        $gambarFileName = null;
            setFlash('error', 'Pembayaran gagal! Bukti bayar tidak ditemukan.');	
            return renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
        }

        $tagihan = $this->tagihan->getByPesananId($pesananId);
        if ($tagihan['status'] == 'tertunda') {
            $this->tagihan->update($tagihan['id'], $pesananId, $tagihan['metode_bayar'], $jumlah_bayar, $gambarFileName, 'lunas');
            setFlash('success', 'Pembayaran berhasil! Pesanan segera diproses.');
            return redirect('/tagihan');
        } else {
            setFlash('error', 'Pembayaran gagal! Tagihan sudah dibayar.');
            return redirect('/tagihan');
        }
    }

    public function terimaBarang($id) {
        $pengiriman = $this->pengiriman->getById($id);
        if ($pengiriman['status'] != 'terkirim') {
            $this->pengiriman->updateStatus($id, 'terkirim');
            setFlash('success', 'Pesanan diterima! Terima kasih telah berbelanja.');
            return redirect('/tagihan');
        } else {
            setFlash('error', 'Pesanan gagal diterima! Pesanan belum dikirim.');
            return redirect('/tagihan');
        }
    }

}
