<?php 

require_once '../controllers/admin/IndexCtrl.php';

$adminPath = '/admin';

addRoute('GET', "{$adminPath}/dashboard", 'IndexCtrl', 'dashboard');