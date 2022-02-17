<?php
echo '<h1 style="color:CornflowerBlue">router test</h1>';

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
$pathBase = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);

$request = str_replace($pathBase, '', $_SERVER['REQUEST_URI']);

$wholePath = $pathBase . $request;


$routes = [];

function route($action, $callback) {

    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

function dispatch($action){

    global $routes;
    $action = trim($action, '/');
    $callback = $routes[$action];

    echo call_user_func($callback);
}

echo '<h1 style="color:CornflowerBlue">router test</h1>';