<?php
if (empty($slug) && !empty($title)) {$slug = $title;}
print_r($_POST);
require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');
echo $title;
echo $content;
echo $short_description;
echo $slug;
echo $created;
echo $modified;
echo $active;
$id = $_GET['id'];
echo $id;
$updatePostStmt->bind_param("ssssssii", $title, $content, $short_description, $slug, $created, $modified, $active, $id);
$updatePostStmt->execute();

if ($updatePostStmt) {
    echo 'Success!';
} else {
    echo 'Failed!';
}