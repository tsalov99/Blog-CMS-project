<?php
require('config.php');
require('dbModels.php');
require('style\header.php');
require('style\navigation.php');

$id = +$_GET['id'];
$getPostForEditStmt->bind_param("i", $id);
$getPostForEditStmt->execute();
$result = mysqli_stmt_get_result($getPostForEditStmt);
$result = $result->fetch_array();

$created = date('Y-m-d H:m:s', strtotime($result['created']));

echo "<div class='text-left p-5 h6'>";
?>

<form action="editPostCheck.php?id=<?= $id ;?>" method="post" enctype="multipart/form-data">

    <label>Title</label>
    <input type="text" name="title" value='<?= htmlspecialchars($result['title']); ?>'>
    <?php if (isset($titleError)) { echo "<p>$titleError</p>"; } ?> <br>

    <label>Short description</label>
    <input type="text" name="short_description" value="<?= htmlspecialchars($result['short_description']); ?>"> <br>
    <?php if(isset($short_description_error)) {echo "<p>" . $short_description_error . "<p>";} ?> <br>

    <label>Content</label>
    <textarea name="content" id="tiny"><?= htmlspecialchars($result['content']); ?></textarea>
    <?php if (isset($contentError)) { echo "<p>$contentError</p>"; } ?> <br>

    <label>Slug</label>
    <input type="text" name="slug" value="<?= htmlspecialchars($result['slug']); ?>"> <br>
    <?php if (isset($slugError)) {echo "<p>$slugError</p>";} ?> <br>

    <label>Date created</label>
    <input type="datetime-local" name="created" value="<?= htmlspecialchars($created) ?>"> <br>
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