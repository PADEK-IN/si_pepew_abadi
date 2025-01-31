<?php
require_once '../helpers/isAuth.php';
require_once '../models/Tagihan.php';
require_once '../models/Pengiriman.php';

class transactionController{
    private $isAuth;
    private $tagihan; 
    private $pengiriman;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();  
        $this->isAuth->isAdmin();
        $this->tagihan = new Tagihan($pdo);
        $this->pengiriman = new Pengiriman($pdo);
    }
    public function list() {
        try {
            $listTagihan = $this->tagihan->getAllWithPesananAndPelangganAndPengiriman();
            // console_log($listTagihan);
            renderView('admin/tagihan/list', compact('listTagihan'));
        } catch (\Exception $e) {
            setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
            return redirect('/home');
        }
    }

    public function laporan() {
        try {
            $listTagihan = $this->tagihan->getAllWithPesananAndPelangganAndPengiriman();
            // console_log($listTagihan);
            renderView('admin/tagihan/laporan', compact('listTagihan'));
        } catch (\Exception $e) {
            setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
            return redirect('/home');
        }
    }

    public function laporanByDateRange() {
        $startDate = filter_input(INPUT_POST, 'startDate', FILTER_DEFAULT);
        $endDate = filter_input(INPUT_POST, 'endDate', FILTER_DEFAULT);

        if (!$startDate || !$endDate) {
            return redirect('/admin/transaksi/laporan');
        }
        $listTagihan = $this->tagihan->getByDateRangeWithPesananAndPelangganAndPengiriman($startDate, $endDate);

        renderView('admin/tagihan/laporan', compact('listTagihan'));
    }

    // pemesanan
        public function pemesanan() {
            renderView('admin/pemesanan/list');
        }
        public function detailPemesanan($id) {
            renderView('admin/pemesanan/detail', ['id' => $id]);
        }

    // tagihan
        public function detailTagihan($id) {
            try {
                $detailTagihan = $this->tagihan->getByIdWithPesananAndPelanggan($id);
                // console_log($detailTagihan);

                renderView('admin/tagihan/detail', compact('detailTagihan'));
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/home');
            }
        }
        public function validasiTagihan($id) {
            try {
                $this->tagihan->validate($id, 'lunas', 1);
                setFlash('success', 'Data Pesanan berhasil divalidasi!');
                redirect('/admin/transaksi/list');
                // renderView('admin/tagihan/validasi');
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/home');
            }
        }
        public function rejectTagihan($id) {
            try {
                $this->tagihan->reject($id, 'batal', 0);
                setFlash('success', 'Data Pesanan berhasil ditolak!');
                redirect('/admin/transaksi/list');
                // renderView('admin/tagihan/validasi');
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/home');
            }
        }

    // pengiriman
        public function pengirimanByDateRange() {
            $startDate = filter_input(INPUT_POST, 'startDate', FILTER_DEFAULT);
            $endDate = filter_input(INPUT_POST, 'endDate', FILTER_DEFAULT);

            if (!$startDate || !$endDate) {
                return redirect('/admin/pengiriman');
            }
            $pengiriman = $this->pengiriman->getPengirimanByDateRange($startDate, $endDate);

            renderView('admin/pengiriman/list', compact('pengiriman'));
        }
    
        public function pengiriman() {
            $pengiriman = $this->pengiriman->getAllWithTagihanAndPesananAndPelanggan();
            renderView('admin/pengiriman/list', compact('pengiriman'));
        }


        public function createPengiriman($id) {
            try {
                $tagihan = $this->tagihan->getByIdWithPesananAndPelanggan($id);
                // console_log($tagihan);
    
                renderView('admin/pengiriman/create', compact('tagihan'));
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/home');
            }
        }
        public function storePengiriman() {
            try {
                $id_pesanan = filter_input(INPUT_POST, 'id_pesanan', FILTER_DEFAULT);
                $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_DEFAULT);
                $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);

                $this->pengiriman->create($id_pesanan, $tanggal, $alamat);

                setFlash('success', 'Data Pengiriman Pesanan berhasil dibuat!');
                redirect('/admin/pengiriman');
            } catch (\Exception $e) {
                setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
                return redirect('/admin/dashboard');
            }
        }
        public function detailPengiriman($id) {
            renderView('admin/pengiriman/detail', ['id' => $id]);
        }
}