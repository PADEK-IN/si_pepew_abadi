<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';
require_once '../controllers/admin/KategoriAdminCtrl.php';
require_once '../controllers/admin/BarangAdminCtrl.php';
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
addRoute('GET', "/{$adminPath}/kategori", $adminPath, 'KategoriAdminCtrl', 'list');
addRoute('POST', "/{$adminPath}/kategori/create", $adminPath, 'KategoriAdminCtrl', 'create');
addRoute('POST', "/{$adminPath}/kategori/update/:id", $adminPath, 'KategoriAdminCtrl', 'update');
addRoute('GET', "/{$adminPath}/kategori/delete/:id", $adminPath, 'KategoriAdminCtrl', 'destroy');
// product
addRoute('GET', "/{$adminPath}/barang", $adminPath, 'BarangAdminCtrl', 'list');
addRoute('GET', "/{$adminPath}/barang/detail/:id", $adminPath, 'BarangAdminCtrl', 'detail');
addRoute('GET', "/{$adminPath}/barang/create", $adminPath, 'BarangAdminCtrl', 'create');
addRoute('POST', "/{$adminPath}/barang/store", $adminPath, 'BarangAdminCtrl', 'store');
addRoute('GET', "/{$adminPath}/barang/edit/:id", $adminPath, 'BarangAdminCtrl', 'edit');
addRoute('POST', "/{$adminPath}/barang/update/:id", $adminPath, 'BarangAdminCtrl', 'update');
addRoute('GET', "/{$adminPath}/barang/delete/:id", $adminPath, 'BarangAdminCtrl', 'destroy');
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