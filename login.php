<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(', ', $_POST['hobbies']) : 'Không có sở thích';
    $job = $_POST['job'];
    $bio = $_POST['bio'];

    // Xử lý hình ảnh upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $img_tmp = $_FILES['profile_picture']['tmp_name'];
        $img_name = $_FILES['profile_picture']['name'];
        $img_path = 'uploads/' . $img_name;
        move_uploaded_file($img_tmp, $img_path);
    } else {
        $img_path = 'Không có hình ảnh tải lên';
    }

    // Hiển thị thông tin
    echo "
    <div class='result-container'>
        <h2>Thông tin đăng ký:</h2>
        <div class='result-item'><strong>Tên truy cập:</strong> $username</div>
        <div class='result-item'><strong>Email:</strong> $email</div>
        <div class='result-item'><strong>Phái:</strong> $gender</div>
        <div class='result-item'><strong>Sở thích:</strong> $hobbies</div>
        <div class='result-item'><strong>Hình nghề nghiệp:</strong> $job</div>
        <div class='result-item'><strong>Giới thiệu bản thân:</strong> $bio</div>
        <div class='result-item'>
            <strong>Hình ảnh:</strong> 
            <br>
            <img src='$img_path' alt='Profile Image' class='profile-img'>
        </div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 450px;
            transform: scale(1);
            transition: all 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #4CAF50;
            font-weight: 700;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
            display: block;
        }

        input[type="text"], input[type="email"], input[type="password"], select, textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus, textarea:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #ffffff;
        }

        .gender-group, .hobbies-group {
            display: flex;
            justify-content: space-between;
        }

        .gender-group input, .hobbies-group input {
            margin-right: 10px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        button {
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            width: 48%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
        }

        button:hover {
            opacity: 0.8;
        }

        .result-container {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            text-align: center;
        }

        .result-item {
            margin: 12px 0;
            color: #333;
        }

        .profile-img {
            max-width: 200px;
            margin-top: 10px;
        }

        .result-container h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Đăng ký thành viên</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="username">Tên truy cập:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Nhập lại mật khẩu:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label>Phái:</label>
            <div class="gender-group">
                <label><input type="radio" name="gender" value="Nam" required> Nam</label>
                <label><input type="radio" name="gender" value="Nữ" required> Nữ</label>
            </div>

            <label for="hobbies">Sở thích:</label>
            <div class="hobbies-group">
                <label><input type="checkbox" name="hobbies[]" value="Đọc sách"> Đọc sách</label>
                <label><input type="checkbox" name="hobbies[]" value="Du lịch"> Du lịch</label>
                <label><input type="checkbox" name="hobbies[]" value="Lập tình"> Lập trình</label>
                <label><input type="checkbox" name="hobbies[]" value="Chơi game"> Chơi game</label>
            </div>

            <label for="job">Nghề nghiệp:</label>
            <select id="job" name="job">
                <option value="Lập trình viên">Lập trình viên</option>
                <option value="Thiết kế">Thiết kế</option>
                <option value="Giáo viên">Giáo viên</option>
                <option value="Sinh viên">Sinh viên</option>
                <option value="Khác">Khác</option>
            </select>

            <label for="bio">Giới thiệu bản thân:</label>
            <textarea id="bio" name="bio" required></textarea>

            <label for="profile_picture">Tải lên hình ảnh:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

            <div class="button-group">
                <button type="submit">Đăng ký</button>
                <button type="reset">Làm lại</button>
            </div>
        </form>
    </div>

</body>
</html>
