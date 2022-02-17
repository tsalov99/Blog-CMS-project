<?php
if (empty($slug) && !empty($title)) {$slug = $title;}
require('config.php');
require('dbModels.php');
require('style/header.php');
require('style/navigation.php');
$updatePostStmt->bind_param("ssssssii", $title, $content, $short_description, $slug, $created, $modified, $active, $id);
$updatePostStmt->execute();

if ($updatePostStmt) {
    echo 'Success!';
} else {
    echo 'Failed!';
}