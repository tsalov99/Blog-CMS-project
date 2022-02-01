<?php

require('config.php');
//$title = $_POST['title'];
//$short_description = $_POST["short_description"];
//$content = $_POST['content'];
//$slug = $_POST['slug'];
//$created = date('Y-m-d H:m:s', strtotime($_POST['created']));
//$active = settype($_POST['active'], "integer");


/* Add post query */
$addPost = "INSERT INTO posts (title, content, short_description, slug, created, active)
VALUES ('$title', '$content', '$short_description', '$slug', '$created', $active)";

/* Select posts query */

$selectPosts = "SELECT * FROM posts";

/* Edit post query */
if (isset($modified)) {
    $updatePost = "UPDATE posts 
    SET title = '$title', content = '$content', short_description = '$short_description', slug = '$slug', created = '$created', modified = '$modified', active = $active
    WHERE id = $id";
}


/* Get 20 posts per page query */

//$getPostsForPages = "SELECT * FROM posts LIMIT $start, $perPage";