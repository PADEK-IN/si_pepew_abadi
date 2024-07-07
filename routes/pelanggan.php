<?php 

require_once '../controllers/pelanggan/IndexCtrl.php';

addRoute('GET', '/', 'IndexCtrl', 'home');