<?php
if (empty($slug) && !empty($title)) {$slug = $title;}
print_r($_POST);
require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');

$updatePostStmt->bind_param("ssssssii", $_POST['title'], $_POST['short_description'], $_POST['content'], $_POST['slug'], $_POST['created'], $_POST['modified'], $_POST['active'], $id);
$updatePostStmt->execute();

if ($updatePostStmt) {
    echo 'Success!';
} else {
    echo 'Failed!';
}