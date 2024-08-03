<?php 

require_once '../controllers/auth/AuthCtrl.php';

$authPath = 'auth';

addRoute('GET', '/logout', $authPath, 'AuthCtrl', 'logout');
addRoute('GET', '/login', $authPath, 'AuthCtrl', 'login');
addRoute('POST', '/login', $authPath, 'AuthCtrl', 'login');
addRoute('GET', '/register', $authPath, 'AuthCtrl', 'register');
addRoute('POST', '/register', $authPath, 'AuthCtrl', 'register');