<?php

class transactionController{
    // pemesanan
        public function pemesanan() {
            renderView('admin/pemesanan/list');
        }
        public function detailPemesanan($id) {
            renderView('admin/pemesanan/detail', ['id' => $id]);
        }

    // tagihan
        public function tagihan() {
            renderView('admin/tagihan/list');
        }
        public function detailTagihan($id) {
            renderView('admin/tagihan/detail', ['id' => $id]);
        }
        public function validasiTagihan() {
            renderView('admin/tagihan/validasi');
        }

    // pengiriman
        public function pengiriman() {
            renderView('admin/pengiriman/list');
        }
        public function detailPengiriman($id) {
            renderView('admin/pengiriman/detail', ['id' => $id]);
        }
}