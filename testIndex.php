<?php
$pathBase = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);

$req = str_replace($pathBase, '', $_SERVER['REQUEST_URI']);



include_once 'request.php';
include_once 'router.php';
$router = new Router(new Request);
echo "<pre>";
print_r($router);
echo "</pre>";
$router->get('/', function() {

});

$router->get('add-article', function() {
    
});


$router->post('add-article', function($request) {
 
});

$router->post('edit-article', function($request) {

});