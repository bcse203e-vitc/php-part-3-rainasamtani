<?php
session_start();
if (!isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setname'])) {
        $_SESSION['user'] = $_POST['uname'];
        header("Location: ?");
        exit;
    }
    ?>
    <form method="post">
    <input type="text" name="uname" required placeholder="Enter Your Name">
    <button type="submit" name="setname">Continue</button>
    </form>
    <?php
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedback'])) {
    $name = $_SESSION['user'];
    $msg = "Feedback from $name: " . $_POST['feedback'];
    mail("admin@vit.ac.in", "Student Feedback", $msg, "From: noreply@vit.ac.in");
    echo "Thank you, $name. Feedback sent!";
    exit;
}
?>
<form method="post">
<textarea name="feedback" required placeholder="Enter feedback"></textarea>
<button type="submit">Submit</button>
</form>
