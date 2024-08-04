<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';
require_once '../controllers/pelanggan/BarangCtrl.php';

$pelangganPath = 'pelanggan';

addRoute('GET', '/home', $pelangganPath, 'IndexCtrl', 'home');
addRoute('GET', '/tentang-kami', $pelangganPath, 'IndexCtrl', 'tentangKami');
addRoute('GET', '/profile', $pelangganPath, 'IndexCtrl', 'profile');
// product
addRoute('GET', '/barang', $pelangganPath, 'BarangCtrl', 'list');
addRoute('GET', '/barang/detail/:id', $pelangganPath, 'BarangCtrl', 'detail');
// kontak
addRoute('GET', '/kontak', $pelangganPath, 'IndexCtrl', 'kontak');
// pemesanan
addRoute('GET', '/keranjang', $pelangganPath, 'IndexCtrl', 'keranjang');
addRoute('GET', '/checkout', $pelangganPath, 'IndexCtrl', 'checkout');
// tagihan
addRoute('GET', '/tagihan', $pelangganPath, 'IndexCtrl', 'tagihan');
