<?php
require_once __DIR__ . '/../app/config/dbconn.php';
require_once __DIR__ . '/../app/routes/web.php';

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) require_once $path;
});

$request = strtok($_SERVER["REQUEST_URI"], '?');
if (isset($routes[$request])) {
    list($controller, $method) = explode('@', $routes[$request]);
    $controllerFile = __DIR__ . "/../app/controllers/$controller.php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $obj = new $controller($pdo);
        $obj->$method();
    } else {
        http_response_code(404);
        echo "Controller not found.";
    }
} else {
    http_response_code(404);
    echo "Route not found.";
}
