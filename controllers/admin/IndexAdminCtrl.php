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

    public function createAdmin() {
        renderView('admin/user/create-admin');
    }
    public function createPelanggan() {
        renderView('admin/user/create-pelanggan');
    }

    public function editAdmin() {
        renderView('admin/user/edit-admin');
    }
    public function editPelanggan() {
        renderView('admin/user/edit-pelanggan');
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

