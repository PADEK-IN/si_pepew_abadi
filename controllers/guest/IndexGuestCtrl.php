<?php

class IndexGuestCtrl {
    public function guest() {
        renderView('guest/index');
    }

    public function barang() {
        renderView('guest/list-produk');
    }

    public function detail() {
        renderView('guest/detail-produk');
    }
}
