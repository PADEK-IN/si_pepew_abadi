<?php 

require_once '../controllers/auth/AuthCtrl.php';

$authPath = 'auth';

addRoute('GET', '/login', $authPath, 'AuthCtrl', 'login');
addRoute('POST', '/login', $authPath, 'AuthCtrl', 'login');
addRoute('GET', '/register', $authPath, 'AuthCtrl', 'register');
addRoute('POST', '/register', $authPath, 'AuthCtrl', 'register');
addRoute('GET', '/login', $authPath, 'AuthCtrl', 'logout');