<?php
$img = imagecreatefrompng("image.png");
$black = imagecolorallocate($img, 0, 0, 0);
imagestring($img, 4, 20, 20, "Watermark Text", $black);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
