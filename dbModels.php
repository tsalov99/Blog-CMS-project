<?php

require('config.php');

/* Add post statement */

$addPostStmt = mysqli_stmt_init($connection);
$addPostStmt->prepare("INSERT INTO posts (title, content, short_description, slug, created, active) VALUES (?,?,?,?,?,?)");

/* Select posts query */

$selectAllPostsQuery = "SELECT * FROM `posts`";


/* Get posts for pages statement */

$getPostsForPagesStmt = mysqli_stmt_init($connection);
$getPostsForPagesStmt->prepare("SELECT * FROM posts LIMIT ?,?");

/* Get post for edit statement */

$getPostForEditStmt = mysqli_stmt_init($connection);
$getPostForEditStmt->prepare("SELECT * FROM posts WHERE id = ?");

/* Update edited post statement */

$updatePostStmt = mysqli_stmt_init($connection);
$updatePostStmt->prepare("UPDATE posts SET title = ?, content = ?, short_description = ?, slug = ?, created = ?, modified = ?, active = ? WHERE id = ?");