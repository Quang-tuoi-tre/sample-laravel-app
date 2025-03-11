<?php
session_start();

// Kiểm tra nếu chưa đăng nhập, chuyển về trang đăng nhập
if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit();
}

// Lấy tên đăng nhập từ session hoặc cookie
$username = $_SESSION['username'] ?? $_COOKIE['username'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Xin chào, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Chào mừng bạn quay trở lại.</p>
        <a href="logout.php" class="logout-btn">Đăng xuất</a>
    </div>
</body>
</html>
