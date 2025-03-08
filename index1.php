<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Phần chính */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: white;
}

/* Container chính */
.container {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    width: 400px;
}

/* Tiêu đề */
h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

/* Định dạng nút chọn file */
.file-label {
    display: inline-block;
    background: #fff;
    color: #6a11cb;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Ẩn input file */
input[type="file"] {
    display: none;
}

/* Nút upload */
button {
    background: #ff9800;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #e68900;
}

/* Phần thông tin */
.info {
    margin-top: 15px;
    font-size: 14px;
    opacity: 0.9;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <p>Chọn nhiều file (hình ảnh hoặc PDF) để tải lên</p>
        
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="fileInput" class="file-label">📂 Chọn file</label>
            <input type="file" name="files[]" id="fileInput" multiple>
            <button type="submit">📤 Upload</button>
        </form>

        <div class="info">
            <p>📌 Chỉ chấp nhận: JPG, PNG, GIF, WEBP, PDF</p>
            <p>📌 Kích thước tối đa: 5MB</p>
        </div>
    </div>
</body>
</html>
