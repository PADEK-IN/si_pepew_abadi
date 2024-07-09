<?php 

require_once '../controllers/admin/IndexAdminCtrl.php';

$adminPath = 'admin';

addRoute('GET', "/{$adminPath}/dashboard", $adminPath, 'IndexAdminCtrl', 'dashboard');
addRoute('GET', "/{$adminPath}/anggota", $adminPath, 'IndexAdminCtrl', 'anggota');