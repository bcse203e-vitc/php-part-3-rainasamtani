<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['user'] = $_POST['uname'];
    header("Location: ?");
    exit;
}
if (isset($_SESSION['user'])) {
    echo "Hello, " . $_SESSION['user'] . "! Welcome back.";
    echo '<br><a href="?logout=1">Logout</a>';
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: ?");
    }
    exit;
}
?>
<form method="post">
<input type="text" name="uname" required>
<button type="submit">Set Name</button>
</form>
