<?php

$routes = [];

function addRoute($method, $route, $controller, $action) {
    global $routes;
    $routes[] = [
        'method' => $method,
        'route' => $route,
        'controller' => $controller,
        'action' => $action
    ];
}

function handleRequest($requestUri) {
    global $routes;

    foreach ($routes as $route) {
        // Menangani rute dengan parameter
        if ($_SERVER['REQUEST_METHOD'] == $route['method']) {
            $pattern = str_replace(':id', '(\d+)', $route['route']); // Mengganti :id dengan regex untuk angka
            if (preg_match("#^{$pattern}$#", $requestUri, $matches)) {
                array_shift($matches);
                require_once "../controllers/{$route['controller']}.php";
                $controller = new $route['controller'];
                $action = $route['action'];
                $controller->$action(...$matches); // Menyusun parameter ke action controller
                return;
            }
        }
    }

    // If no route matched, show 404 page
    http_response_code(404);
    echo "404 Not Found";
}

function renderView($view, $data = []) {
    // Extract data array to variables
    extract($data);

    // Define base directory for views
    $baseDir = '../views/';

    // Get and sanitize the request URI
    $requestUri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

    // Determine the component based on the request URI
    if ($requestUri == "/login" || $requestUri == "/register") {
        $component = 'auth';
    } elseif (strpos($requestUri, "/admin") === 0) {
        $component = 'admin';
    } else {
        $component = 'pelanggan';
    }

    // Set the paths for header, content, and footer
    $headerPath = $baseDir . "components/{$component}/header.php";
    $contentPath = $baseDir . "pages/{$component}/{$view}.php";
    $footerPath = $baseDir . "components/{$component}/footer.php";

    // Include the files
    if (file_exists($headerPath)) require_once $headerPath;
    if (file_exists($contentPath)) require_once $contentPath;
    if (file_exists($footerPath)) require_once $footerPath;
}
