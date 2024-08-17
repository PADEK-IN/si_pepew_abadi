<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';
require_once '../controllers/pelanggan/BarangCtrl.php';
require_once '../controllers/pelanggan/PesananCtrl.php';
require_once '../controllers/pelanggan/KeranjangCtrl.php';
require_once '../controllers/pelanggan/TagihanCtrl.php';

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
addRoute('POST', '/keranjang/update/:id', $pelangganPath, 'KeranjangCtrl', 'update');
addRoute('GET', '/keranjang/delete/:id', $pelangganPath, 'KeranjangCtrl', 'destroy');

// pemesanan
addRoute('GET', '/pesananku', $pelangganPath, 'PesananCtrl', 'pesananku');
addRoute('POST', '/checkout', $pelangganPath, 'PesananCtrl', 'checkout');
addRoute('POST', '/checkout/store', $pelangganPath, 'PesananCtrl', 'checkoutStore');
addRoute('POST', '/pesanan/create', $pelangganPath, 'PesananCtrl', 'create');
addRoute('POST', '/pesanan/store', $pelangganPath, 'PesananCtrl', 'store');

// tagihan
addRoute('GET', '/tagihan', $pelangganPath, 'TagihanCtrl', 'tagihan');
addRoute('POST', '/tagihan/pembayaran', $pelangganPath, 'TagihanCtrl', 'pembayaran');
addRoute('GET', '/tagihan/terima-barang/:id', $pelangganPath, 'TagihanCtrl', 'terimaBarang');
