<?php

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
$pathBase = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);

$request = str_replace($pathBase, '', $_SERVER['REQUEST_URI']);

$wholePath = $pathBase . $request;


$routes = [];
$actionOLD = trim($_SERVER['REQUEST_URI'], '/'); // Taking the url action from SERVER variable and trim it - OLD WAY

preg_match_all("/^.+?(?=\?|$)/", $_SERVER['REQUEST_URI'], $wholeActionResult); // TAKING URL BEFORE PARAMETERS and split it by slashes into separated parts and take last - NEW WAY
$action = explode('/', $wholeActionResult[0][0]);
$action = end($action);


$params = [];
/* Check for params */
$check = preg_match_all("/(?<=\?).+/", $_SERVER['REQUEST_URI'], $paramMatch); // TAKING ALL PARAMETERS in URL after question mark and separated them by "?"
if (!empty($paramMatch[0])){
  $paramMatch = explode("?", $paramMatch[0][0]);
}
/*  */


function route($action, $callback) {

    global $routes;
    $routes[$action] = $callback;
}

function routeWithParameters($action, $callback) {
    global $routes;
  
    $routes[$action] = $callback;
}

function dispatch($action){

    global $routes;
    $action = trim($action, '/');
    $action = explode("/",$action)[0];
    $callback = $routes[$action];
    echo call_user_func($callback);
}