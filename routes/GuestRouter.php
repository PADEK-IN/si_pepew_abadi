<?php 

require_once '../controllers/guest/IndexGuestCtrl.php';

$ctrlPath = 'guest';

addRoute('GET', '/', $ctrlPath, 'IndexGuestCtrl', 'guest');
addRoute('GET', '/public/barang', $ctrlPath, 'IndexGuestCtrl', 'barang');
addRoute('GET', '/public/detail-barang/:id', $ctrlPath, 'IndexGuestCtrl', 'detail');
