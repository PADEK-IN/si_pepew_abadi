<?php

class productController{
    // kategori
        public function kategori() {
            renderView('admin/kategori/list');
        }

    // produk
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
}