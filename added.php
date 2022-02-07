<?php
if (empty($slug) && !empty($title)) {$slug = $title;}

require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');
print_r($_FILES);
[$title, $short_description, $content, $slug, $created, $active] = [$_POST['title'], $_POST['short_description'], $_POST['content'], $_POST['slug'], $_POST['created'], $_POST['active']];
$created = date('Y-m-d H:m:s', strtotime($_POST['created']));


$addPostStmt->bind_param('ssssssi', $title, $short_description, $content, $slug, $created, $uploadPath, $active);
$addPostStmt->execute();
print_r($addPostStmt);
//$imgUpload->bind_param('si', $_FILES['imgUpload']['tmp_name'], ); Under construction

if (($addPostStmt)) {
    echo "Success";
} else {
    echo "Failed";
}