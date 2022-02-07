<?php
if (!isset($title)) {$title = '';}
if (!isset($short_description)) {$short_description = '';}
if (!isset($content)) {$content = '';}
if (!isset($slug) && isset($title)) {$slug = '';}
if (empty($slug) && !empty($title)) {$slug = $title;}
require('style\header.php');
require('style\navigation.php');
?>

<form action="addPostCheck.php" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label>Title</label>
    <input  type="text" name="title" value="<?php echo $title; ?>">
    <?php if (isset($titleError)) { echo "<p class='error'>$titleError</p>"; } ?> <br>

    <label>Short description</label>
    <input type="text" name="short_description" value="<?php echo $short_description; ?>"> <br>
    <?php if(isset($short_description_error)) {echo "<p class='error'>$short_description_error<p>";} ?> <br>

    <label>Content</label>
    <textarea name="content" id="text" value="<?php echo $content; ?>"></textarea>
    <?php if (isset($contentError)) { echo "<p class='error'>$contentError</p>"; } ?> <br>

    <label>Slug</label>
    <input type="text" name="slug" value="<?php echo $slug; ?>"> <br>
    <?php if (isset($slugError)) {echo "<p class='error'>$slugError</p>";} ?> <br>

    <label>Date created</label>
    <input type="datetime-local" name="created"> <br>

    <label>Created:</label>
    <?php if (isset($created)) {echo $created;} ?> <br>

    <label>Post image:</label> <br>
    <input type="file" name="imgUpload"> <br>
    
    <label>Active</label>
    <input type="radio" name="active" value=1 checked>
    <label>Hidden</label>
    <input type="radio" name="active" value=0>
    <br>

    <input type="submit" value="Add post">
    </div>
</form>
