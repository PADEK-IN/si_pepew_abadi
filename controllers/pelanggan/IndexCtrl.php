<?php

class IndexCtrl {
    public function home() {
        renderView('pelanggan/home/index');
    }

    public function tentangKami() {
        renderView('pelanggan/home/tentang-kami');
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

}
