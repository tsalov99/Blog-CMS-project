<?php
require('config.php');
require('dbModels.php');
require('style/header.php');
require('style/navigation.php');

$id = $_GET['id'];

$deletePostStmt->bind_param("i", $id);
$deletePostStmt->execute();

if ($deletePostStmt) {
    echo ("Deleted");
}