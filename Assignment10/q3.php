<?php
session_start();
$name = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['uname'];
    $p = $_POST['pwd'];
    if ($u == 'admin' && $p == '1234') {
        if (isset($_POST['rem'])) {
            setcookie('user', $u, time() + 86400);
        }
        echo "Welcome $u";
        exit;
    } else {
        echo "Invalid";
        exit;
    }
}
?>
<form method="post">
<input type="text" name="uname" value="<?php echo $name; ?>" required>
<input type="password" name="pwd" required>
<label><input type="checkbox" name="rem"> Remember Me</label>
<button type="submit">Login</button>
</form>
