<?php
session_start();

// Danh sách tài khoản hợp lệ (có thể dùng database)
$valid_users = [
    "admin" => "123456",
    "user" => "password"
];

// Lấy dữ liệu từ form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Kiểm tra tài khoản
if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
    $_SESSION['username'] = $username;

    // Nếu chọn "Ghi nhớ đăng nhập", lưu vào cookie trong 7 ngày
    if (isset($_POST['remember'])) {
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        setcookie("password", $password, time() + (7 * 24 * 60 * 60), "/");

    }

    header("Location: welcome.php");
    exit();
} else {
    echo "<script>alert('Sai tài khoản hoặc mật khẩu!'); window.location.href='index2.php';</script>";
}
?>
