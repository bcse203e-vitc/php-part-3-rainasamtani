<?php
$w = 300;
$h = 200;
$img = imagecreatetruecolor($w, $h);
for ($x = 0; $x < $w; $x++) {
    $r = intval(255 * $x / $w);
    $g = 100;
    $b = 255 - $r;
    $c = imagecolorallocate($img, $r, $g, $b);
    imageline($img, $x, 0, $x, $h, $c);
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
