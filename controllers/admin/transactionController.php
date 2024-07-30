<?php

class transactionController{
    public function pemesanan() {
        renderView('admin/pemesanan/list');
    }
    public function tagihan() {
        renderView('admin/tagihan/list');
    }
    public function pengiriman() {
        renderView('admin/pengiriman/list');
    }
}