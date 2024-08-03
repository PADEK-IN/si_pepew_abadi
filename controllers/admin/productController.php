<?php

class productController{
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