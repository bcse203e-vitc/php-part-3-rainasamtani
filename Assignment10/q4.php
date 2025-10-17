<?php
session_start();

if (isset($_POST['submit'])) {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        echo "CAPTCHA Verified";
    } else {
        echo "Invalid CAPTCHA";
    }
    exit;
}

$captcha = rand(1000, 9999);
$_SESSION['captcha'] = $captcha;
$image = imagecreate(70, 30);
$bg = imagecolorallocate($image, 255, 255, 255);
$text = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 10, 5, $captcha, $text);
ob_start();
imagepng($image);
$imageData = ob_get_clean();
imagedestroy($image);
?>
<form method="post">
<img src="data:image/png;base64,<?php echo base64_encode($imageData); ?>">
<input type="text" name="captcha" required>
<button type="submit" name="submit">Submit</button>
</form>
