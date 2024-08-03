<?php

$routes = [];

function addRoute($method, $route, $controllerPath, $controller, $action) {
    global $routes;
    $routes[] = [
        'method' => $method,
        'route' => $route,
        'controllerPath' => $controllerPath,
        'controller' => $controller,
        'action' => $action
    ];
}

function handleRequest($requestUri, $pdo) {
    global $routes;

    foreach ($routes as $route) {
        if ($_SERVER['REQUEST_METHOD'] == $route['method']) {
            $pattern = str_replace(':id', '(\d+)', $route['route']);
            if (preg_match("#^{$pattern}$#", $requestUri, $matches)) {
                array_shift($matches);
                $controllerFilePath = "../controllers/{$route['controllerPath']}/{$route['controller']}.php";
                if (file_exists($controllerFilePath)) {
                    require_once $controllerFilePath;
                    $controllerClass = $route['controller'];
                    $controller = new $controllerClass($pdo); // Pass PDO here
                    $action = $route['action'];
                    $controller->$action(...$matches); // Pass parameters to action
                    return;
                }
            }
        }
    }

    // If no route matched, show 404 page
    http_response_code(404);
    renderView('../errors/404');
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
    $contentPath = $baseDir . "pages/{$view}.php";
    $footerPath = $baseDir . "components/{$component}/footer.php";

    // Include the files
    if (file_exists($headerPath)) require_once $headerPath;
    if (file_exists($contentPath)) require_once $contentPath;
    if (file_exists($footerPath)) require_once $footerPath;
}
