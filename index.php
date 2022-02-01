<?php
require('config.php');
require('style\header.php');
require('style\navigation.php');

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $_GET['page'] = 1;
    $page = 1;
}
$perPage = 10;
$start = ($page - 1) * $perPage;
$selectPosts = "SELECT * FROM posts";
$getPostsForPages = "SELECT * FROM posts LIMIT $start, $perPage";
$allPosts = mysqli_query($connection, $selectPosts);

if (mysqli_num_rows($allPosts) !== 0) {
    $pagesNumber = mysqli_query($connection, $getPostsForPages);
}
$totalPages = ceil(mysqli_num_rows($allPosts) / $perPage);

$page !== 1 && $page > 1 ? $prevousPage = $page - 1 : $prevousPage = 1;
$page < $totalPages ? $nextPage = $page + 1 : $nextPage = $totalPages;
    include('pagesNavigation.php');    
if (mysqli_num_rows($allPosts) > 0) {
    echo "<table class='table table-striped table-bordered text-center'><thead class='thead-dark'><tr><th>Title</th><th>Created</th><th>Active</th></tr></thead>";
    while ($row = mysqli_fetch_array($pagesNumber)) {
        $row['active'] === '1' ? $active = 'Yes' : $active = 'No';
        echo "<tr class='text-dark h5'><td class='p-0'><a class='text-dark' style='text-decoration:none; display:blocked;' href='detailView.php?id=$row[id]'><p class='m-0'>$row[title]</p></a></td>";
        echo "<td>$row[created]</td>";
        echo "<td>$active</td></tr>";
    }
    echo "</table>";
    
    include('pagesNavigation.php');
    }