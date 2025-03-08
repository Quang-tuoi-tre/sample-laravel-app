<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Ngày Sinh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        select {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Chọn Ngày Sinh</h1>

    <form method="post">
        <!-- Chọn Ngày -->
        <label for="day">Chọn ngày:</label>
        <select name="day" id="day">
            <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>

        <!-- Chọn Tháng -->
        <label for="month">Chọn tháng:</label>
        <select name="month" id="month">
            <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>

        <!-- Chọn Năm -->
        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <?php
                for ($i = 1930; $i <= 2020; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>

        <button type="submit">Gửi</button>
    </form>
</div>

</body>
</html>
