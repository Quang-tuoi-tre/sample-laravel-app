<?php
// Kiểm tra nếu đã có cookie lưu đăng nhập
if (isset($_COOKIE["username"])) {
    header("Location: welcome.php"); // Chuyển hướng nếu đã nhớ đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="login1.php" method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <label>
                <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
            </label>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
