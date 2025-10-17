<?php
$img = imagecreatetruecolor(300, 300);
imagefilledrectangle($img, 0, 0, 300, 300, imagecolorallocate($img, 255, 255, 255));
for ($i = 0; $i < 15; $i++) {
    $c = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    $x1 = rand(10, 250);
    $y1 = rand(10, 250);
    $x2 = $x1 + rand(30, 80);
    $y2 = $y1 + rand(30, 80);
    if ($i % 2 == 0) {
        imagefilledrectangle($img, $x1, $y1, $x2, $y2, $c);
    } else {
        imagefilledellipse($img, $x1, $y1, rand(40, 100), rand(40, 100), $c);
    }
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
