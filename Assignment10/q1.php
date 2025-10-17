<?php
$visits = isset($_COOKIE['counter']) ? ($_COOKIE['counter'] + 1) : 1;
setcookie('counter', $visits, time() + 1800);
echo "You have visited this site $visits times.";
?>
