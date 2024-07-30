<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';
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
// product
    addRoute('GET', "/{$adminPath}/produk", $adminPath, 'productController', 'produk');
    addRoute('GET', "/{$adminPath}/produk/tambah", $adminPath, 'productController', 'createProduk');
    addRoute('GET', "/{$adminPath}/produk/detail", $adminPath, 'productController', 'detailProduk');
    addRoute('GET', "/{$adminPath}/produk/edit", $adminPath, 'productController', 'editProduk');
// transaksi
    addRoute('GET', "/{$adminPath}/pemesanan", $adminPath, 'transactionController', 'pemesanan');
    addRoute('GET', "/{$adminPath}/tagihan", $adminPath, 'transactionController', 'tagihan');
    addRoute('GET', "/{$adminPath}/pengiriman", $adminPath, 'transactionController', 'pengiriman');