<?php
require('config.php');
require('style/header.php');
require('style/navigation.php');
$id = $_GET['id'];
$getPostView = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($connection, $getPostView);
if($result) {
    $singlePost = mysqli_fetch_array($result);
    $singlePost['active'] === '1' ? $active = 'Yes' : $active = 'No';
    echo "<div class='text-left p-5 h6'>";
    echo "<p class='h3'>Title:</p>";
    echo "<p>$singlePost[title]</p>";

    echo "<p class='h3'>Short description:</p>";
    echo "<p>$singlePost[short_description]</p>";

    echo "<p class='h3'>Content:</p>";
    echo "<p>$singlePost[content]</p>";

    echo "<p class='h3'>Slug:</p>";
    echo "<p>$singlePost[slug]</p>";
    
    echo "<p class='h3'>Created at: $singlePost[created]</p>";
    
    echo "<p class='h3'>Last change: $singlePost[modified]</p>";

    echo "<p class='h3'>Active: $active</p>";

    echo "<a href=edit.php?id=$id><p>Edit post</p></a>";
    echo "<a href=deleted.php?id=$id><p>Delete post</p></a>";
    echo "</div>";
} else {
    echo "No record with this ID";
}
