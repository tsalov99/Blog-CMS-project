<?php

require('config.php');

/* Add post statement */

$addPostStmt = $connection->stmt_init();
$addPostStmt->prepare("INSERT INTO posts (title, content, short_description, slug, created, active) VALUES (?,?,?,?,?,?)");

/* Select posts query */

$selectAllPostsQuery = "SELECT * FROM posts";


/* Get posts for pages statement */

$getPostsForPagesStmt = $connection->stmt_init();
$getPostsForPagesStmt->prepare("SELECT * FROM posts LIMIT ?,?");

/* Get post for detail view */

$getPostDetailViewStmt = $connection->stmt_init();
$getPostDetailViewStmt->prepare("SELECT * FROM posts WHERE slug = ?");

/* Get post for edit statement */

$getPostForEditStmt = $connection->stmt_init();
$getPostForEditStmt->prepare("SELECT * FROM posts WHERE slug = ?");

/* Update edited post statement */

$updatePostStmt = $connection->stmt_init();
$updatePostStmt->prepare("UPDATE posts SET title = ?, content = ?, short_description = ?, slug = ?, created = ?, modified = ?, active = ? WHERE id = ?");

/* Delete post statement */

$deletePostStmt = $connection->stmt_init();
$deletePostStmt->prepare("DELETE FROM posts WHERE slug = ?");

/* Slug duplicate check statement */

$slugDuplicateStmt = $connection->stmt_init();
$slugDuplicateStmt->prepare("SELECT slug FROM posts WHERE slug = ?");

/* Image upload statement */

$imgUploadStmt = $connection->stmt_init();
$imgUploadStmt->prepare("INSERT INTO images (`path`, parent_post_slug) VALUES (?, ?)");

/* Get path statement */

$getPathStmt = $connection->stmt_init();
//$getPathStmt->prepare("SELECT FROM images WHERE parent_post_id")