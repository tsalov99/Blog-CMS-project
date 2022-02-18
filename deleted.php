<?php
require('config.php');
require('dbModels.php');
require('style/header.php');
require('style/navigation.php');
$slug = array_key_first($_GET);

$deletePostStmt->bind_param("s", $slug);
$deletePostStmt->execute();
if ($deletePostStmt && isset($slug)) {
    echo ("Deleted");
} else {
    echo ("No active post");
}