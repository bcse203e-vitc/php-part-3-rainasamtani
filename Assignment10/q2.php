<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ?welcome=1");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['uname'];
    $p = $_POST['pwd'];
    if ($u == 'admin' && $p == '1234') {
        $_SESSION['user'] = $u;
        header("Location: ?welcome=1");
        exit;
    } else {
        echo "Invalid Login";
    }
}
if (isset($_GET['welcome']) && isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'];
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
<input type="password" name="pwd" required>
<button type="submit">Login</button>
</form>
