<?php

class IndexAdminCtrl {
    public function dashboard() {
        renderView('admin/dashboard/index');
    }

// user
    public function admin() {
        renderView('admin/user/list-admin');
    }
    public function pelanggan() {
        renderView('admin/user/list-pelanggan');
    }


// costumer
    public function costumer() {
        renderView('admin/pelanggan/list');
    }
    public function detailCostumer() {
        renderView('admin/pelanggan/detail');
    }

// product
    public function produk() {
        renderView('admin/produk/list');
    }
    public function createProduk() {
        renderView('admin/produk/create');
    }
    public function detailProduk() {
        renderView('admin/produk/detail');
    }
    public function editProduk() {
        renderView('admin/produk/edit');
    }

// pesanan
    public function pesanan() {
        renderView('admin/pesanan/list');
    }
    public function detailPesanan() {
        renderView('admin/pesanan/detail');
    }

// laporan
    public function laporanBarang() {
        renderView('admin/laporan/produk');
    }
    public function laporanAnggota() {
        renderView('admin/laporan/anggota');
    }
    public function laporanPemesanan() {
        renderView('admin/laporan/pesanan');
    }
    public function laporanPengiriman() {
        renderView('admin/laporan/pengiriman');
    }
    public function laporanTagihan() {
        renderView('admin/laporan/tagihan');
    }
}

