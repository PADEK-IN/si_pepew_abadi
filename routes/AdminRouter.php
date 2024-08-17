<?php

require_once '../controllers/admin/IndexAdminCtrl.php';
require_once '../controllers/admin/KategoriAdminCtrl.php';
require_once '../controllers/admin/BarangAdminCtrl.php';
require_once '../controllers/admin/transactionController.php';

$adminPath = 'admin';

addRoute('GET', "/{$adminPath}/dashboard", $adminPath, 'IndexAdminCtrl', 'dashboard');
// user
addRoute('GET', "/{$adminPath}/admin-list", $adminPath, 'IndexAdminCtrl', 'admin');
addRoute('GET', "/{$adminPath}/admin/detail/:id", $adminPath, 'IndexAdminCtrl', 'detailAdmin');
addRoute('GET', "/{$adminPath}/create/admin", $adminPath, 'IndexAdminCtrl', 'createAdmin');
addRoute('POST', "/{$adminPath}/admin/store", $adminPath, 'IndexAdminCtrl', 'storeAdmin');
addRoute('GET', "/{$adminPath}/edit/admin/:id", $adminPath, 'IndexAdminCtrl', 'editAdmin');
addRoute('POST', "/{$adminPath}/admin/update/:id", $adminPath, 'IndexAdminCtrl', 'updateAdmin');
addRoute('GET', "/{$adminPath}/admin/delete/:id", $adminPath, 'IndexAdminCtrl', 'destroyAdmin');

addRoute('GET', "/{$adminPath}/pelanggan-list", $adminPath, 'IndexAdminCtrl', 'pelanggan');
addRoute('GET', "/{$adminPath}/pelanggan/detail/:id", $adminPath, 'IndexAdminCtrl', 'detailPelanggan');
addRoute('GET', "/{$adminPath}/create/pelanggan", $adminPath, 'IndexAdminCtrl', 'createPelanggan');
addRoute('POST', "/{$adminPath}/pelanggan/store", $adminPath, 'IndexAdminCtrl', 'storePelanggan');
addRoute('GET', "/{$adminPath}/edit/pelanggan/:id", $adminPath, 'IndexAdminCtrl', 'editPelanggan');
addRoute('POST', "/{$adminPath}/pelanggan/update/:id", $adminPath, 'IndexAdminCtrl', 'updatePelanggan');
addRoute('GET', "/{$adminPath}/pelanggan/delete/:id", $adminPath, 'IndexAdminCtrl', 'destroyPelanggan');
// kategori
addRoute('GET', "/{$adminPath}/kategori", $adminPath, 'KategoriAdminCtrl', 'list');
addRoute('POST', "/{$adminPath}/kategori/create", $adminPath, 'KategoriAdminCtrl', 'create');
addRoute('POST', "/{$adminPath}/kategori/update/:id", $adminPath, 'KategoriAdminCtrl', 'update');
addRoute('GET', "/{$adminPath}/kategori/delete/:id", $adminPath, 'KategoriAdminCtrl', 'destroy');
// product
addRoute('GET', "/{$adminPath}/barang", $adminPath, 'BarangAdminCtrl', 'list');
addRoute('GET', "/{$adminPath}/barang/laporan", $adminPath, 'BarangAdminCtrl', 'laporan');
addRoute('GET', "/{$adminPath}/barang/detail/:id", $adminPath, 'BarangAdminCtrl', 'detail');
addRoute('GET', "/{$adminPath}/barang/create", $adminPath, 'BarangAdminCtrl', 'create');
addRoute('POST', "/{$adminPath}/barang/store", $adminPath, 'BarangAdminCtrl', 'store');
addRoute('GET', "/{$adminPath}/barang/edit/:id", $adminPath, 'BarangAdminCtrl', 'edit');
addRoute('POST', "/{$adminPath}/barang/update/:id", $adminPath, 'BarangAdminCtrl', 'update');
addRoute('POST', "/{$adminPath}/barang/stok/:id", $adminPath, 'BarangAdminCtrl', 'updateStok');
addRoute('GET', "/{$adminPath}/barang/delete/:id", $adminPath, 'BarangAdminCtrl', 'destroy');
// transaksi
addRoute('GET', "/{$adminPath}/transaksi/list", $adminPath, 'transactionController', 'list');
addRoute('GET', "/{$adminPath}/transaksi/laporan", $adminPath, 'transactionController', 'laporan');
// pesanan
addRoute('GET', "/{$adminPath}/pemesanan", $adminPath, 'transactionController', 'pemesanan');
addRoute('GET', "/{$adminPath}/pemesanan/:id", $adminPath, 'transactionController', 'detailPemesanan');
// tagihan
addRoute('GET', "/{$adminPath}/tagihan/:id", $adminPath, 'transactionController', 'detailTagihan');
addRoute('POST', "/{$adminPath}/tagihan-validasi/:id", $adminPath, 'transactionController', 'validasiTagihan');
addRoute('POST', "/{$adminPath}/tagihan-reject/:id", $adminPath, 'transactionController', 'rejectTagihan');
// pengiriman
addRoute('GET', "/{$adminPath}/pengiriman", $adminPath, 'transactionController', 'pengiriman');
addRoute('GET', "/{$adminPath}/pengiriman/create/:id", $adminPath, 'transactionController', 'createPengiriman');
addRoute('POST', "/{$adminPath}/pengiriman/store", $adminPath, 'transactionController', 'storePengiriman');
addRoute('GET', "/{$adminPath}/pengiriman/:id", $adminPath, 'transactionController', 'detailPengiriman');
