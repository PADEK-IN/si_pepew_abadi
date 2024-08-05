<?php
require_once '../helpers/isAuth.php';
require_once '../models/Barang.php';
require_once '../models/Pesanan.php';
require_once '../models/Pesanan_Item.php';
require_once '../models/Pelanggan.php';
require_once '../models/Tagihan.php';
require_once '../helpers/flash.php';
require_once '../helpers/redirect.php';
require_once '../helpers/imageHandler.php';

class TagihanCtrl {
    private $isAuth;
    private $tagihan; 
    private $imageHelper;

    public function __construct($pdo=null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
        $this->tagihan = new Tagihan($pdo);
        $this->imageHelper = new ImageHandler();
    }

    public function tagihan() {
        renderView('pelanggan/tagihan/list');
    }

    public function pembayaran() {
        $id_pesanan = filter_input(INPUT_POST, 'id_pesanan', FILTER_SANITIZE_NUMBER_INT);
        $jumlah_bayar = filter_input(INPUT_POST, 'jumlah_bayar', FILTER_SANITIZE_NUMBER_INT);
        
         $gambar = $_FILES['bukti'] ?? null;
         if ($gambar && $gambar['error'] === UPLOAD_ERR_OK) {
            $result = $this->imageHelper->uploadImageBukti($gambar);
            if (!$result['success']) {
                setFlash('error', $result['message']);
                return redirect('/tagihan');
            }
            $gambarFileName = $result['filename'];
         } else {
            $gambarFileName = null;
            setFlash('error', 'Pembayaran gagal! Bukti bayar tidak ditemukan.');	
            redirect('/tagihan');
         }

        $tagihan = $this->tagihan->getByPesananId($id_pesanan);
        if ($tagihan['status'] == 'tertunda') {
            $this->tagihan->update($tagihan['id'], $id_pesanan, $tagihan['metode_bayar'], $jumlah_bayar, $gambarFileName);
            setFlash('success', 'Pembayaran berhasil! Menunggu konfirmasi dari admin.');
            redirect('/tagihan');
        } else {
            setFlash('error', 'Pembayaran gagal! Tagihan sudah dibayar.');
            redirect('/tagihan');
        }
    }

}
