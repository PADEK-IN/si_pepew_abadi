<?php
session_start(); // Mengaktifkan session
// Load the config app
require_once '../config/app.php';
require_once '../config/db.php';

// Load the routes
require_once '../routes/index.php';

// Handle the request
handleRequest($_SERVER['REQUEST_URI'], $pdo);

?>
