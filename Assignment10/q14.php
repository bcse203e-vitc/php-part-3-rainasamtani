<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = "example@domain.com";
    $sub = "New Message";
    $msg = "From: " . $_POST['name'] . "\nEmail: " . $_POST['email'] . "\n\n" . $_POST['message'];
    $headers = "From: " . $_POST['email'];
    if (mail($to, $sub, $msg, $headers)) {
        echo "Message Sent";
    } else {
        echo "Failed";
    }
    exit;
}
?>
<form method="post">
<input type="text" name="name" required placeholder="Your Name">
<input type="email" name="email" required placeholder="Your Email">
<textarea name="message" required placeholder="Your Message"></textarea>
<button type="submit">Send</button>
</form>
