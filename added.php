<?php
if (empty($slug) && !empty($title)) {$slug = $title;}

require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');
print_r($_POST);

[$title, $short_description, $content, $slug, $created, $active] = [$_POST['title'], $_POST['short_description'], $_POST['content'], $_POST['slug'], $_POST['created'], $_POST['active']];

$addPostStmt->bind_param('sssssi', $title, $short_description, $content, $slug, $created, $active);
$addPostStmt->execute();
if (($addPostStmt)) {
    echo "Success";
} else {
    echo "Failed";
}