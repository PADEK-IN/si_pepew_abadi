<?php
require_once '../helpers/isAuth.php';
require_once '../models/Barang.php';
require_once '../models/Pesanan.php';
require_once '../models/Pesanan_Item.php';
require_once '../models/Pelanggan.php';
require_once '../models/Keranjang.php';
require_once '../models/Tagihan.php';
require_once '../helpers/flash.php';
require_once '../helpers/logTerminal.php';
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

    public function create() {
        $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_DEFAULT);
        $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);

        $pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
        $alamat = $pelanggan['alamat'];
        $barang = $this->barang->getById($id_barang);

        renderView('pelanggan/pesanan/create', compact('barang', 'alamat', 'jumlah'));
    }

    public function store() {
        try {
            $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_SANITIZE_NUMBER_INT);
            $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);
            $metode_kirim = filter_input(INPUT_POST, 'metode_kirim', FILTER_DEFAULT);
            $metode_bayar = filter_input(INPUT_POST, 'metode_bayar', FILTER_DEFAULT);
            
            $total = $this->barang->getById($id_barang)['harga'] * $jumlah;
            $ppn = $total * 0.11;
            $net = $total + $ppn;

            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            $pesananId = $this->pesanan->create($id_pelanggan, $metode_kirim, $ppn, $net);
            $this->pesanan_item->create($pesananId, $id_barang, $jumlah);

            if($metode_bayar == 'transfer'){
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan lakukan pembayaran.');
                renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
            } else {
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan tunggu konfirmasi dari admin.');
                redirect('/tagihan');
            }
        } catch (\Throwable $th) {
            setFlash('error', 'Server error, gagal membuat pesanan!'.$th->getMessage());
            redirect('/barang/detail/'.$id_barang);
        }
    }

    public function checkout() {
        $ids = filter_input(INPUT_POST, 'ids', FILTER_DEFAULT);
        $checkedItems = explode(',', $ids);
        $pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
        $alamat = $pelanggan['alamat'];
        $barangs = $this->keranjang->getByIdsWithBarang($_SESSION['user']['id'], $checkedItems);

        $total = 0;
        foreach($barangs as $barang) {
            $total += $barang['harga'] * $barang['jumlah'];
        }
        $ppn = $total * 0.11;
        $net = $total + $ppn;

        renderView('pelanggan/pesanan/checkout', compact('barangs', 'alamat', 'total', 'ppn', 'net', 'ids'));	
    }

    public function checkoutStore(){
        try {
            $id_keranjang = filter_input(INPUT_POST, 'id_keranjang', FILTER_DEFAULT);
            $ongkir = filter_input(INPUT_POST, 'ongkir', FILTER_SANITIZE_NUMBER_INT);
            $metode_kirim = filter_input(INPUT_POST, 'metode_kirim', FILTER_DEFAULT);
            $metode_bayar = filter_input(INPUT_POST, 'metode_bayar', FILTER_DEFAULT);
            $total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_INT);
            
            $ids_keranjangs = explode(',', $id_keranjang);

            $ppn = $total*0.11;
            $net = $total + $ppn;

            $id_pelanggan = $this->pelanggan->getByUserEmail($_SESSION['user']['email'])['id'];
            $pesananId = $this->pesanan->create($id_pelanggan, $metode_kirim, $ppn, $net);
            
            foreach($ids_keranjangs as $id_keranjang){
                $keranjang = $this->keranjang->getById($id_keranjang);
                $this->keranjang->delete($id_keranjang);
                $this->pesanan_item->create($pesananId, $keranjang['id_barang'], $keranjang['jumlah']);
            }

            if($metode_bayar == 'transfer'){
                $this->tagihan->create($pesananId, $metode_bayar);
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan lakukan pembayaran.');
                renderView('pelanggan/tagihan/pembayaran', compact('pesananId', 'net'));
            } else {
                setFlash('success', 'Pesanan berhasil dibuat! Silahkan tunggu konfirmasi dari admin.');
                redirect('/tagihan');
            }
        } catch (\Throwable $th) {
            setFlash('error', 'Server error, gagal membuat pesanan!'.$th->getMessage());
            redirect('/barang');
        }
    }

}
