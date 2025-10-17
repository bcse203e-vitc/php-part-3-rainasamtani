<?php
$width = 450;
$height = 70;
$img = imagecreatetruecolor($width, $height);
$bg = imagecolorallocate($img, 230, 230, 230);
$txt = imagecolorallocate($img, 20, 20, 20);
imagefilledrectangle($img, 0, 0, $width, $height, $bg);
$message = "Banner - " . date("d-m-Y H:i:s");
imagestring($img, 4, 15, 25, $message, $txt);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
