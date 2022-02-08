<?php
include('config.php');
include('dbModels.php');


$title = htmlspecialchars($_POST['title']);
if(strlen($title) === 0) {$titleError = 'This field cannot be empty!';}
else if (strlen($title) > 80) {$titleError = 'This field must be under 80 characters!';}


$content = htmlspecialchars($_POST['content']);
if(strlen($content) === 0) {$contentError = 'The field cannot be empty!';}


$short_description = htmlspecialchars($_POST['short_description']);
if(strlen($short_description) === 0) {$short_description_error = 'The field cannot be empty!';}
else if (strlen($short_description) > 150) {$short_description_error = 'This field must be under 150 characters!';}


$slug = htmlspecialchars($_POST['slug']);
if (strlen($slug) === 0) { $_POST['slug'] = $title; $slug = $title;}
else if (strlen($slug) > 80) {$slugError = 'This field must be under 80 characters!';}
$slugDuplicate->bind_param("s", $slug);
$slugDuplicate->execute();
$result = $slugDuplicate->get_result();

if ($result->num_rows > 0) {
    $slugError = 'This slug arleady exists';
}


$created = date('Y-m-d H:m:s', strtotime($_POST['created']));

/* img check */

$imgName = $_FILES['imgUpload']['name'];
$imgType = $_FILES['imgUpload']['type'];
$imgSize = $_FILES['imgUpload']['size'];
$imgTmpPath = $_FILES['imgUpload']['tmp_name'];
$fileExtension = explode(".", $imgName);
$fileExtension = end($fileExtension);
$imgName = md5(time() . $imgName) . '.' . $fileExtension;
$uploadPath = 'files/img/' . $imgName;
if(move_uploaded_file($imgTmpPath, $uploadPath)) {
    echo "Success";
}
echo $fileExtension;


$active = ($_POST['active']);

if(!empty($titleError) || !empty($contentError) || !empty($short_description_error) || !empty($slugError) || !empty($createdError) || !empty($activeError)) {
    include('add.php');
} else {
    include('added.php');
}