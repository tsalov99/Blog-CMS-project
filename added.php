<?php
if (empty($slug) && !empty($title)) {$slug = $title;}

require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');

[$title, $short_description, $content, $slug, $created, $active] = [$_POST['title'], $_POST['short_description'], $_POST['content'], $_POST['slug'], $_POST['created'], $_POST['active']];
$created = date('Y-m-d H:m:s', strtotime($_POST['created']));

$addPostStmt->bind_param('sssssi', $title, $content, $short_description, $slug, $created, $active);
$addPostStmt->execute();

if (($addPostStmt)) {
    echo "Success";
} else {
    echo "Failed";
}