<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';

$pelangganPath = 'pelanggan';

addRoute('GET', '/', $pelangganPath, 'IndexCtrl', 'home');