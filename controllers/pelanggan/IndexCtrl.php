<?php

class IndexCtrl {
    public function home() {
        renderView('pelanggan/home/index');
    }

    public function tentangKami() {
        renderView('pelanggan/home/tentang-kami');
    }

    public function profile() {
        renderView('pelanggan/home/profile');
    }

    // Product
    public function produk() {
        renderView('pelanggan/produk/list');
    }
    public function detailProduk() {
        renderView('pelanggan/produk/detail');
    }
    
    // kontak
    public function kontak() {
        renderView('pelanggan/home/kontak');
    }

    // pemesanan
    public function keranjang() {
        renderView('pelanggan/pesanan/list');
    }
    public function checkout() {
        renderView('pelanggan/pesanan/checkout');
    }

    // tagihan
    public function tagihan() {
        renderView('pelanggan/tagihan/list');
    }

}
