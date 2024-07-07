<?php 

require_once '../controllers/auth/AuthCtrl.php';

addRoute('GET', '/login', 'AuthCtrl', 'login');
addRoute('POST', '/login', 'AuthCtrl', 'login');
addRoute('GET', '/register', 'AuthCtrl', 'register');
addRoute('POST', '/register', 'AuthCtrl', 'register');
addRoute('GET', '/login', 'AuthCtrl', 'logout');