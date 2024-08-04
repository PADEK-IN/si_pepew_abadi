<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';
require_once '../controllers/pelanggan/BarangCtrl.php';

$pelangganPath = 'pelanggan';
// Home
addRoute('GET', '/home', $pelangganPath, 'IndexCtrl', 'home');
addRoute('GET', '/profile', $pelangganPath, 'IndexCtrl', 'profile');
addRoute('POST', '/profile/update/:id', $pelangganPath, 'IndexCtrl', 'profileUpdate');

// Barang
addRoute('GET', '/barang', $pelangganPath, 'BarangCtrl', 'list');
addRoute('GET', '/barang/detail/:id', $pelangganPath, 'BarangCtrl', 'detail');

// pemesanan
addRoute('GET', '/keranjang', $pelangganPath, 'IndexCtrl', 'keranjang');
addRoute('GET', '/checkout', $pelangganPath, 'IndexCtrl', 'checkout');

// tagihan
addRoute('GET', '/tagihan', $pelangganPath, 'IndexCtrl', 'tagihan');
