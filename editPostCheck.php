<?php
if (!isset($_POST['title'])) {$title = $result['title'];}
else {$title = htmlspecialchars($_POST['title']);}

if(strlen($title) === 0) {$titleError = 'This field cannot be empty!';}
else if (strlen($title) > 80) {$titleError = 'This field must be under 80 characters!';}


if (!isset($_POST['content'])) {$content = $result['content'];}
else {$content = ($_POST['content']);}

if(strlen($content) === 0) {$contentError = 'The field cannot be empty!';}


if(!isset($_POST['short_description'])){$short_description = $result['short_description'];}
else {$short_description = htmlspecialchars($_POST['short_description']);}

if(strlen($short_description) === 0) {$short_description_error = 'The field cannot be empty!';}
else if (strlen($short_description) > 150) {$short_description_error = 'This field must be under 150 characters!';}

if (!isset($_POST['slug'])) {$slug = $result['slug'];}
else {$slug = htmlspecialchars($_POST['slug']);}

if (strlen($slug) === 0) { $slug = $title;}
else if (strlen($slug) > 80) {$slugError = 'This field must be under 80 characters!';}



$created = date('Y-m-d H:m:s', strtotime($_POST['created']));
$modified = date('Y-m-d H:m:s');
$active = +$_POST['active'];

if(!empty($titleError) || !empty($contentError) || !empty($short_description_error) || !empty($slugError) || !empty($createdError) || !empty($activeError)) {
    include('edit.php');
} else {
    include('edited.php');
    include('imgUpload.php');
}