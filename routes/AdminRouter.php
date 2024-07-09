<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';

$adminPath = 'admin';

addRoute('GET', "/{$adminPath}/dashboard", $adminPath, 'IndexAdminCtrl', 'dashboard');
addRoute('GET', "/{$adminPath}/anggota", $adminPath, 'IndexAdminCtrl', 'anggota');
addRoute('GET', "/{$adminPath}/anggota/tambah", $adminPath, 'IndexAdminCtrl', 'tambahAnggota');
addRoute('GET', "/{$adminPath}/anggota/edit", $adminPath, 'IndexAdminCtrl', 'editAnggota');