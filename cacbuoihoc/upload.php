<?php
// Tạo thư mục "uploads" nếu chưa có
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Danh sách định dạng file hợp lệ
$allowedTypes = ['jpg', 'png', 'gif', 'webp', 'pdf'];
$maxSize = 5 * 1024 * 1024; // 5MB

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả Upload</title>
        <style>
            /* Giao diện chung */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: white;
    text-align: center;
}

/* Container chính */
.container {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Tiêu đề */
h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Kết quả upload */
.upload-results {
    margin-top: 15px;
    text-align: left;
}

/* Thông báo lỗi */
.error {
    color: #ff4c4c;
    font-weight: bold;
}

/* Hộp chứa thông tin file */
.file-box {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
}

/* Ảnh preview */
.preview-img {
    width: 100px;
    height: auto;
    border-radius: 5px;
    margin-top: 5px;
}

/* Link tải file PDF */
.download-link {
    display: inline-block;
    background: #ff9800;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 5px;
    font-size: 14px;
}

.download-link:hover {
    background: #e68900;
}

/* Nút quay lại */
.back-btn {
    display: inline-block;
    margin-top: 15px;
    color: white;
    font-weight: bold;
    text-decoration: none;
    background: #27ae60;
    padding: 8px 15px;
    border-radius: 5px;
}

.back-btn:hover {
    background: #219150;
}

        </style>
</head>
<body>
    <div class="container">
        <h2>Kết quả Upload</h2>
        
        <div class="upload-results">
            <?php
            if (!empty($_FILES['files']['name'][0])) {
                foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
                    $fileName = $_FILES['files']['name'][$key];
                    $fileSize = $_FILES['files']['size'][$key];
                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                    // Kiểm tra định dạng file
                    if (!in_array($fileExt, $allowedTypes)) {
                        echo "<p class='error'>❌ File '$fileName' không hợp lệ!</p>";
                        continue;
                    }

                    // Kiểm tra kích thước file
                    if ($fileSize > $maxSize) {
                        echo "<p class='error'>❌ File '$fileName' vượt quá 5MB!</p>";
                        continue;
                    }

                    // Đổi tên file để tránh trùng lặp
                    $newFileName = time() . "_" . uniqid() . "." . $fileExt;
                    $filePath = $uploadDir . $newFileName;

                    // Lưu file vào thư mục uploads/
                    if (move_uploaded_file($tmpName, $filePath)) {
                        echo "<div class='file-box'>";

                        // Hiển thị file nếu là ảnh
                        if (in_array($fileExt, ['jpg', 'png', 'gif', 'webp'])) {
                            echo "<img src='$filePath' class='preview-img'>";
                        } else {
                            // Nếu là file PDF, cung cấp link tải
                            echo "<a href='$filePath' target='_blank' class='download-link'>📄 Tải file PDF</a>";
                        }

                        echo "</div>";
                    } else {
                        echo "<p class='error'>❌ Lỗi khi upload file '$fileName'!</p>";
                    }
                }
            } else {
                echo "<p class='error'>❌ Vui lòng chọn file để upload!</p>";
            }
            ?>
        </div>

        <a href="index1.php" class="back-btn">⬅ Quay lại</a>
    </div>
</body>
</html>
