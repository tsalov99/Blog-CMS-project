<?php

include_once 'request.php';
include_once 'router.php';
$router = new Router(new Request);

$router->get('', function() {
    
});


$router->post('add-article', function($request) {
 
});

$router->post('edit-article', function($request) {

});