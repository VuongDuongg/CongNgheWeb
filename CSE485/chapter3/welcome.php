<?php
session_start(); // BẮT BUỘC: phải gọi trước mọi output

// Kiểm tra session đã lưu username hay chưa
if (isset($_SESSION['username'])) {
    // Lấy username từ SESSION
    $loggedInUser = $_SESSION['username'];

    // In lời chào (escape để tránh XSS)
    echo "<h1>Chào mừng trở lại, " . htmlspecialchars($loggedInUser, ENT_QUOTES, 'UTF-8') . "!</h1>";
    echo "<p>Bạn đã đăng nhập thành công.</p>";
    // Link tạm thời để "Đăng xuất"
    echo '<p><a href="login.html">Đăng xuất (Tạm thời)</a></p>';
} else {
    // Chưa đăng nhập -> chuyển về trang login
    header('Location: login.html');
    exit;
}
?>