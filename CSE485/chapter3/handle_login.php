
<?php
session_start(); // MUST be before any output

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $user = isset($_POST['username']) ? trim($_POST['username']) : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    // Simulated auth check
    if ($user === 'admin' && $pass === '123') {
        $_SESSION['username'] = $user; // store logged-in user
        header('Location: welcome.php');
        exit;
    } else {
        header('Location: login.html?error=1');
        exit;
    }
} else {
    // Direct access: redirect to login
    header('Location: login.html');
    exit;
}
?>
