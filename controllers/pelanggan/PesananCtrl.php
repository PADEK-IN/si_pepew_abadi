<?php
require_once '../helpers/isAuth.php';
require_once '../models/Barang.php';
require_once '../models/Pesanan.php';
require_once '../models/Pesanan_Item.php';
require_once '../models/Pelanggan.php';
require_once '../models/Keranjang.php';
require_once '../models/Tagihan.php';
require_once '../helpers/flash.php';
require_once '../helpers/redirect.php';
class PesananCtrl {
    private $isAuth;
    private $barang;
    private $pesanan;
    private $pesanan_item;
    private $keranjang;
    private $tagihan;
    private $pelanggan;

    public function __construct($pdo=null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
        $this->barang = new Barang($pdo);
        $this->pesanan = new Pesanan($pdo);
        $this->pesanan_item = new PesananItems($pdo);
        $this->pelanggan = new Pelanggan($pdo);
        $this->keranjang = new Keranjang($pdo);
        $this->tagihan = new Tagihan($pdo);
    }

    public function pesananku() {
        try {
            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            $detailPesanan = $this->tagihan->getByIdPelangganWithDetailPesanan($id_pelanggan);
            // console_log($detailPesanan);
            return renderView('pelanggan/pesanan/pesananku', compact('detailPesanan'));
        } catch (\Exception $e) {
            setFlash('error', 'Server Error, terjadi kesalahan saat mengambil data tagihan.'. $e->getMessage());
            return redirect('/barang');
        }
    }

    public function create() {
        try {
            $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_DEFAULT);
            $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);
            $barang = $this->barang->getById($id_barang);

            if($jumlah > $barang['stok']) {
                setFlash('error', 'Maaf, stok barang tidak mencukupi');
                return redirect('/barang/detail/'.$id_barang);
            }

            $pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
            $alamat = $pelanggan['alamat'];

            renderView('pelanggan/pesanan/create', compact('barang', 'alamat', 'jumlah'));
        } catch (\Exception $th) {
            setFlash('error', 'Server error, gagal membuat pesanan!'.$th->getMessage());
            redirect('/barang/detail/'.$id_barang);
        }
    }

    public function store() {
        try {
            $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_SANITIZE_NUMBER_INT);
            $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);
            $ongkir = filter_input(INPUT_POST, 'ongkir', FILTER_SANITIZE_NUMBER_INT);
            $metode_kirim = filter_input(INPUT_POST, 'metode_kirim', FILTER_DEFAULT);
            $metode_bayar = filter_input(INPUT_POST, 'metode_bayar', FILTER_DEFAULT);
            
            $barang = $this->barang->getById($id_barang);
            
            if($jumlah > $barang['stok']) {
                setFlash('error', 'Maaf, stok barang tidak mencukupi');
                return redirect('/barang/detail/'.$id_barang);
            }

            $total = $this->barang->getById($id_barang)['harga'] * $jumlah;
            $ppn = $total * 0.11;
            $net = $total + $ppn + $ongkir;

            // buat pesanan
            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            $pesananId = $this->pesanan->create($id_pelanggan, $metode_kirim, $ppn, $net, $ongkir);
            $this->pesanan_item->create($pesananId, $id_barang, $jumlah);
            
            // kurangi stok barang
            $stok = $this->barang->getById($id_barang)['stok'] - $jumlah;
            $this->barang->updateStok($id_barang, $stok);

            if($metode_bayar == 'transfer'){
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan lakukan pembayaran.');
                return renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
            } else {
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan tunggu konfirmasi dari admin.');
                return redirect('/tagihan');
            }
        } catch (\Exception $th) {
            setFlash('error', 'Server error, gagal membuat pesanan!'.$th->getMessage());
            return redirect('/barang/detail/'.$id_barang);
        }
    }

    public function checkout() {
        try {
            $ids = filter_input(INPUT_POST, 'ids', FILTER_DEFAULT);
            $checkedItems = explode(',', $ids);
            $pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
            $alamat = $pelanggan['alamat'];
            $barangs = $this->keranjang->getByIdsWithBarang($_SESSION['user']['id'], $checkedItems);

            $total = 0;
            foreach($barangs as $barang) {
                if($barang['jumlah'] > $barang['stok']) {
                    setFlash('error', 'Maaf, stok barang '.$barang['nama'].' tidak mencukupi.');
                    return redirect('/keranjang');
                }
                $total += $barang['harga'] * $barang['jumlah'];
            }
            $ppn = $total * 0.11;
            $net = $total + $ppn;

            return renderView('pelanggan/pesanan/checkout', compact('barangs', 'alamat', 'total', 'ppn', 'net', 'ids'));
        } catch (\Exception $th) {
            setFlash('error', 'Server error, gagal checkout!'.$th->getMessage());
            return redirect('/keranjang');
        }	
    }

    public function checkoutStore(){
        try {
            $id_keranjang = filter_input(INPUT_POST, 'id_keranjang', FILTER_DEFAULT);
            $ongkir = filter_input(INPUT_POST, 'ongkir', FILTER_SANITIZE_NUMBER_INT);
            $metode_kirim = filter_input(INPUT_POST, 'metode_kirim', FILTER_DEFAULT);
            $metode_bayar = filter_input(INPUT_POST, 'metode_bayar', FILTER_DEFAULT);
            $total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_INT);
            $ids_keranjangs = explode(',', $id_keranjang);

            $ppn = $total * 0.11;
            $net = $total + $ppn + $ongkir;

            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            
            foreach($ids_keranjangs as $id){
                $keranjang = $this->keranjang->getByIdKeranjangAndIdUserWithBarang($id, $_SESSION['user']['id']);
                if($keranjang['jumlah'] > $keranjang['stok']) {
                    setFlash('error', 'Maaf, stok barang '.$keranjang['nama'].' tidak mencukupi.');
                    return redirect('/keranjang');
                }
            }

            $pesananId = $this->pesanan->create($id_pelanggan, $metode_kirim, $ppn, $net, $ongkir);

            foreach($ids_keranjangs as $id){
                $keranjang = $this->keranjang->getById($id);
                // buat pesanan item
                $this->pesanan_item->create($pesananId, $keranjang['id_barang'], $keranjang['jumlah']);
                // hapus keranjang
                $this->keranjang->delete($id);
                // kurangi stok barang
                $stok = $this->barang->getById($keranjang['id_barang'])['stok'] - $keranjang['jumlah'];
                $this->barang->updateStok($keranjang['id_barang'], $stok);
            }

            if($metode_bayar == 'transfer'){
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan lakukan pembayaran.');
                return renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
            } else {
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan tunggu konfirmasi dari admin.');
                return redirect('/tagihan');
            }
        } catch (\Exception $th) {
            setFlash('error', 'Server error, gagal membuat pesanan!'.$th->getMessage());
            return redirect('/barang');
        }
    }

}
