<?php

class transactionController{
    // pemesanan
    public function pemesanan() {
        renderView('admin/pemesanan/list');
    }
    public function detailPemesanan($id) {
        renderView('admin/pemesanan/detail', ['id' => $id]);
    }

    public function tagihan() {
        renderView('admin/tagihan/list');
    }
    public function pengiriman() {
        renderView('admin/pengiriman/list');
    }
}