<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pic'])) {
    $tmp = $_FILES['pic']['tmp_name'];
    $info = getimagesize($tmp);
    if ($info['mime'] == 'image/jpeg') {
        $src = imagecreatefromjpeg($tmp);
    } elseif ($info['mime'] == 'image/png') {
        $src = imagecreatefrompng($tmp);
    } else {
        exit("Unsupported format");
    }
    $width = imagesx($src);
    $height = imagesy($src);
    $maxWidth = 300;
    $ratio = $width / $height;
    $newWidth = $maxWidth;
    $newHeight = $maxWidth / $ratio;
    $resized = imagescale($src, $newWidth, $newHeight);
    header("Content-Type: " . $info['mime']);
    if ($info['mime'] == 'image/jpeg') {
        imagejpeg($resized);
    } else {
        imagepng($resized);
    }
    imagedestroy($src);
    imagedestroy($resized);
    exit;
}
?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="pic" required>
<button type="submit">Resize</button>
</form>
