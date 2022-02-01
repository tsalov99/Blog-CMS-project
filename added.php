<?php
if (empty($slug) && !empty($title)) {$slug = $title;}

require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');
$result = mysqli_query($connection, $addPost);
if ($result) {
    echo 'Success!';
} else {
    echo 'Failed!';
}