<?php
$to = "user@example.com";
$subject = "File Attached";
$from = "noreply@example.com";
$file = "sample.txt";
$content = chunk_split(base64_encode(file_get_contents($file)));
$boundary = md5(time());
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
$body .= "Please find the attachment.\r\n\r\n";
$body .= "--$boundary\r\n";
$body .= "Content-Type: application/octet-stream; name=\"$file\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"$file\"\r\n\r\n";
$body .= $content . "\r\n";
$body .= "--$boundary--";
if (mail($to, $subject, $body, $headers)) {
    echo "Email sent";
} else {
    echo "Failed";
}
?>
