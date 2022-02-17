<?php

require ('router.php');

route('', function() {
    require 'index.php';
});

route('add-article', function() {
    require('add.php'); 
});

route('edit-article', function() {
    require('edit.php');
});

route('article-list', function() {
    require('index.php');
});

route('add-post-check', function() {
    require('addPostCheck.php');
});

route('edit-post-check', function() {
    require('editPostCheck.php');
});

routeWithParameters('article', function() {
    require('detailView.php');
});

routeWithParameters('add', function() {
    require('add.php');
});

routeWithParameters('edit', function() {
    require('edit.php');
});

routeWithParameters('delete-article', function() {
    require('deleted.php');
});


//print_r($action);

if (!array_key_exists($action, $routes)) {
    route($action, function() {
        require('errorPage.php');
    });}
    
    if ($check > 0) {
        $params = $paramMatch[0];
        dispatch($action);
    } else {
        dispatch($action);
    }
    



