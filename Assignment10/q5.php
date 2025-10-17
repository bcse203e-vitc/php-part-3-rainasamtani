<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $name = time() . '_' . $_FILES['image']['name'];
    $path = __DIR__ . '/uploads/' . $name;
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    echo "<img src='uploads/$name' style='width:200px;height:auto;'>";
    exit;
}
?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image" required>
<button type="submit">Upload</button>
</form>
