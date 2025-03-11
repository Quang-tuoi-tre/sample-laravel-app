<?php
session_start();
session_destroy();

// Xóa cookie đăng nhập
setcookie("username", "", time() - 3600, "/");

header("Location: index2.php");
exit();
?>
