<?php
require('config.php');
require('dbModels.php');
require('style/header.php');
require('style/navigation.php');
$slug = array_key_first($_GET);

$getPostDetailViewStmt->bind_param("s", $slug);
$getPostDetailViewStmt->execute();

//8$getPostView = "SELECT * FROM posts WHERE slug = '$slug'";
$result = mysqli_stmt_get_result($getPostDetailViewStmt);
$result = $result->fetch_array();
if($result) {
    
    $singlePost = $result;
    $singlePost['active'] === '1' ? $active = 'Yes' : $active = 'No';
    print_r($singlePost);
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

    echo "<a href=edit?$slug><p>Edit post</p></a>";
    echo "<a href=delete-article?$slug><p>Delete post</p></a>";
    echo "</div>";
} else {
    echo "No record with this ID";
}
