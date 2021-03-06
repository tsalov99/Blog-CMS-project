<?php
require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');


$slug = array_key_first($_GET);

/* Check if slug exists */

$slugDuplicateStmt->bind_param('s', $slug);
$slugDuplicateStmt->execute();
$slugExists = $slugDuplicateStmt->get_result();
if ($slugExists->num_rows === 0) {
    echo "Missing";
    die;
}
$getPostForEditStmt->bind_param("s", $slug);
$getPostForEditStmt->execute();
$result = mysqli_stmt_get_result($getPostForEditStmt);
$result = $result->fetch_array();
$created = date('Y-m-d H:m:s', strtotime($result['created']));

session_start();
$_SESSION['id'] = $result['id'];

echo "<div class='text-left p-5 h6'>";
?>

<form action="edit-post-check?<?php $slug; ?>" method="post" enctype="multipart/form-data">

    <label>Title</label>
    <input type="text" name="title" value='<?= ($result['title']); ?>'>
    <?php if (isset($titleError)) { echo "<p>$titleError</p>"; } ?> <br>

    <label>Short description</label>
    <input type="text" name="short_description" value="<?= ($result['short_description']); ?>"> <br>
    <?php if(isset($short_description_error)) {echo "<p>" . $short_description_error . "<p>";} ?> <br>

    <label>Content</label>
    <textarea name="content" id="tiny"><?=($result['content']); ?></textarea>
    <?php if (isset($contentError)) { echo "<p>$contentError</p>"; } ?> <br>

    <label>Slug</label>
    <input type="text" name="slug" value="<?= ($result['slug']); ?>"> <br>
    <?php if (isset($slugError)) {echo "<p>$slugError</p>";} ?> <br>

    <label>Date created</label>
    <input type="datetime-local" name="created" value="<?= ($created) ?>"> <br>
    <?php if (isset($created)) {echo $created;} ?> <br>
    
    <label>Post image:</label> <br>
    <input type="file" name="imgUpload[]" multiple> <br>


    <br>
    <label>Active</label>
    <input type="radio" name="active" value=1 checked>
    <label>Hidden</label>
    <input type="radio" name="active" value=0>
    <br>

    <input type="submit" value="Save post">
</form>
<?php
echo "</div>";