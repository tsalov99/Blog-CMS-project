<?php
require('config.php');
require('style\header.php');
require('style\navigation.php');
$id = $_GET['id'];
$delete = "DELETE FROM posts WHERE id=$id";
$result = mysqli_query($connection, $delete);

if ($result) {
    echo ("Deleted");
}