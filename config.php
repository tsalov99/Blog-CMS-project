<?php
[$server, $username, $password] = ['localhost', 'root', '']; //set host/ username/ password/ db-name

$connection = new mysqli($server, $username, $password);

if ($connection->connect_errno) {
    die('Failed to connect, erorr: ' . $connection->connect_error);
}

if (!$connection->query("CREATE DATABASE IF NOT EXISTS `blog-cms-project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci")) {
    echo "DATABASE WAS NOT CREATED";
}

$connection->select_db('blog-cms-project');

$postsTableQuery = "CREATE TABLE IF NOT EXISTS `posts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(80) NOT NULL,
    `content` text NOT NULL,
    `short_description` varchar(150) DEFAULT NULL,
    `slug` varchar(80) NOT NULL,
    `created` datetime NOT NULL,
    `modified` datetime DEFAULT NULL,
    `active` bit(1) DEFAULT NULL,
    PRIMARY KEY (`id`))";

if (!$connection->query($postsTableQuery)) {
    echo "TABLE WAS NOT CREATED";
}