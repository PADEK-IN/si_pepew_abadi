<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';

$adminPath = 'admin';

addRoute('GET', "/{$adminPath}/dashboard", $adminPath, 'IndexAdminCtrl', 'dashboard');
// user
addRoute('GET', "/{$adminPath}/user/admin", $adminPath, 'IndexAdminCtrl', 'admin');
addRoute('GET', "/{$adminPath}/user/pelanggan", $adminPath, 'IndexAdminCtrl', 'pelanggan');
// costumer
addRoute('GET', "/{$adminPath}/costumer", $adminPath, 'IndexAdminCtrl', 'costumer');
addRoute('GET', "/{$adminPath}/costumer/detail", $adminPath, 'IndexAdminCtrl', 'detailCostumer');
// product
addRoute('GET', "/{$adminPath}/produk", $adminPath, 'IndexAdminCtrl', 'produk');
addRoute('GET', "/{$adminPath}/produk/tambah", $adminPath, 'IndexAdminCtrl', 'createProduk');
addRoute('GET', "/{$adminPath}/produk/detail", $adminPath, 'IndexAdminCtrl', 'detailProduk');
addRoute('GET', "/{$adminPath}/produk/edit", $adminPath, 'IndexAdminCtrl', 'editProduk');
// pesanan
addRoute('GET', "/{$adminPath}/pesanan", $adminPath, 'IndexAdminCtrl', 'pesanan');
addRoute('GET', "/{$adminPath}/pesanan/detail", $adminPath, 'IndexAdminCtrl', 'detailPesanan');
// laporan
addRoute('GET', "/{$adminPath}/laporan-barang", $adminPath, 'IndexAdminCtrl', 'laporanBarang');
addRoute('GET', "/{$adminPath}/laporan-anggota", $adminPath, 'IndexAdminCtrl', 'laporanAnggota');
addRoute('GET', "/{$adminPath}/laporan-pemesanan", $adminPath, 'IndexAdminCtrl', 'laporanPemesanan');
addRoute('GET', "/{$adminPath}/laporan-pengiriman", $adminPath, 'IndexAdminCtrl', 'laporanPengiriman');
addRoute('GET', "/{$adminPath}/laporan-tagihan", $adminPath, 'IndexAdminCtrl', 'laporanTagihan');