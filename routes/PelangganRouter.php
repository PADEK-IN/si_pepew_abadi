<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';

$pelangganPath = 'pelanggan';

addRoute('GET', '/', $pelangganPath, 'IndexCtrl', 'home');
addRoute('GET', '/tentang-kami', $pelangganPath, 'IndexCtrl', 'tentangKami');
// product
addRoute('GET', '/produk', $pelangganPath, 'IndexCtrl', 'produk');
addRoute('GET', '/produk/:id', $pelangganPath, 'IndexCtrl', 'detailProduk');
// kontak
addRoute('GET', '/kontak', $pelangganPath, 'IndexCtrl', 'kontak');
