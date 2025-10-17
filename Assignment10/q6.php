<?php
$img = imagecreatetruecolor(250, 250);
$white = imagecolorallocate($img, 255, 255, 255);
$blue = imagecolorallocate($img, 0, 0, 255);
$green = imagecolorallocate($img, 0, 150, 0);
imagefilledrectangle($img, 0, 0, 250, 250, $white);
imageline($img, 20, 20, 230, 20, $blue);
imageellipse($img, 125, 125, 120, 120, $green);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
