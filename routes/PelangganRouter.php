<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';
require_once '../controllers/pelanggan/BarangCtrl.php';
require_once '../controllers/pelanggan/PesananCtrl.php';
require_once '../controllers/pelanggan/KeranjangCtrl.php';

$pelangganPath = 'pelanggan';
// Home
addRoute('GET', '/home', $pelangganPath, 'IndexCtrl', 'home');
addRoute('GET', '/profile', $pelangganPath, 'IndexCtrl', 'profile');
addRoute('POST', '/profile/update/:id', $pelangganPath, 'IndexCtrl', 'profileUpdate');

// Barang
addRoute('GET', '/barang', $pelangganPath, 'BarangCtrl', 'list');
addRoute('GET', '/barang/detail/:id', $pelangganPath, 'BarangCtrl', 'detail');

// keranjang
addRoute('GET', '/keranjang', $pelangganPath, 'KeranjangCtrl', 'list');
addRoute('GET', '/keranjang/:id', $pelangganPath, 'KeranjangCtrl', 'store');
addRoute('GET', '/keranjang/delete/:id', $pelangganPath, 'KeranjangCtrl', 'destroy');

// pemesanan
addRoute('GET', '/pesan/store', $pelangganPath, 'PesananCtrl', 'store');
addRoute('GET', '/checkout', $pelangganPath, 'PesananCtrl', 'checkout');

// tagihan
addRoute('GET', '/tagihan', $pelangganPath, 'PesananCtrl', 'tagihan');
