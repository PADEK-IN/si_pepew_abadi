<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';
require_once '../controllers/admin/productController.php';

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
// pesanan
    addRoute('GET', "/{$adminPath}/pesanan", $adminPath, 'IndexAdminCtrl', 'pesanan');
    addRoute('GET', "/{$adminPath}/pesanan/detail", $adminPath, 'IndexAdminCtrl', 'detailPesanan');
// laporan
    addRoute('GET', "/{$adminPath}/laporan-barang", $adminPath, 'IndexAdminCtrl', 'laporanBarang');
    addRoute('GET', "/{$adminPath}/laporan-anggota", $adminPath, 'IndexAdminCtrl', 'laporanAnggota');
    addRoute('GET', "/{$adminPath}/laporan-pemesanan", $adminPath, 'IndexAdminCtrl', 'laporanPemesanan');
    addRoute('GET', "/{$adminPath}/laporan-pengiriman", $adminPath, 'IndexAdminCtrl', 'laporanPengiriman');
    addRoute('GET', "/{$adminPath}/laporan-tagihan", $adminPath, 'IndexAdminCtrl', 'laporanTagihan');