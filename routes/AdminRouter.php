<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';
require_once '../controllers/admin/KategoriCtrl.php';
require_once '../controllers/admin/productController.php';
require_once '../controllers/admin/transactionController.php';

$adminPath = 'admin';

addRoute('GET', "/{$adminPath}/dashboard", $adminPath, 'IndexAdminCtrl', 'dashboard');
// user
addRoute('GET', "/{$adminPath}/admin-list", $adminPath, 'IndexAdminCtrl', 'admin');
addRoute('GET', "/{$adminPath}/pelanggan-list", $adminPath, 'IndexAdminCtrl', 'pelanggan');
addRoute('GET', "/{$adminPath}/create/admin", $adminPath, 'IndexAdminCtrl', 'createAdmin');
addRoute('GET', "/{$adminPath}/create/pelanggan", $adminPath, 'IndexAdminCtrl', 'createPelanggan');
addRoute('GET', "/{$adminPath}/edit/admin", $adminPath, 'IndexAdminCtrl', 'editAdmin');
addRoute('GET', "/{$adminPath}/edit/pelanggan", $adminPath, 'IndexAdminCtrl', 'editPelanggan');
// kategori
addRoute('GET', "/{$adminPath}/kategori", $adminPath, 'KategoriCtrl', 'list');
addRoute('POST', "/{$adminPath}/kategori/create", $adminPath, 'KategoriCtrl', 'create');
addRoute('POST', "/{$adminPath}/kategori/update/:id", $adminPath, 'KategoriCtrl', 'update');
addRoute('GET', "/{$adminPath}/kategori/delete/:id", $adminPath, 'KategoriCtrl', 'destroy');
// product
addRoute('GET', "/{$adminPath}/barang", $adminPath, 'productController', 'produk');
addRoute('GET', "/{$adminPath}/barang/tambah", $adminPath, 'productController', 'createProduk');
addRoute('GET', "/{$adminPath}/barang/detail", $adminPath, 'productController', 'detailProduk');
addRoute('GET', "/{$adminPath}/barang/edit", $adminPath, 'productController', 'editProduk');
// transaksi
// pesanan
addRoute('GET', "/{$adminPath}/pemesanan", $adminPath, 'transactionController', 'pemesanan');
addRoute('GET', "/{$adminPath}/pemesanan/:id", $adminPath, 'transactionController', 'detailPemesanan');
// tagihan
addRoute('GET', "/{$adminPath}/tagihan", $adminPath, 'transactionController', 'tagihan');
addRoute('GET', "/{$adminPath}/tagihan/:id", $adminPath, 'transactionController', 'detailTagihan');
addRoute('GET', "/{$adminPath}/tagihan-validasi-list", $adminPath, 'transactionController', 'validasiTagihan');
// pengiriman
addRoute('GET', "/{$adminPath}/pengiriman", $adminPath, 'transactionController', 'pengiriman');
addRoute('GET', "/{$adminPath}/pengiriman/:id", $adminPath, 'transactionController', 'detailPengiriman');