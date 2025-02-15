<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #00b4d8, #0077b6); /* Màu nền gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #00b4d8;
            outline: none;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background-color: #00b4d8;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #0077b6;
        }

        .forgot-password {
            color: #0077b6;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            display: block;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <!-- Form đăng nhập -->
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>
        <a href="#" class="forgot-password">Quên mật khẩu?</a>
    </div>

    <?php
        // Xử lý form đăng nhập (phần PHP)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Giả sử đây là thông tin tài khoản hợp lệ
            $valid_username = 'admin';
            $valid_password = '123456';

            // Kiểm tra thông tin đăng nhập
            if ($username == $valid_username && $password == $valid_password) {
                echo "<p style='text-align: center; color: green;'>Đăng nhập thành công!</p>";
            } else {
                echo "<p style='text-align: center; color: red;'>Tên đăng nhập hoặc mật khẩu không đúng!</p>";
            }
        }
    ?>
</body>
</html>
