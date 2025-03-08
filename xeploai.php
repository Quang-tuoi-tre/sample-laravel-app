<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $khuvuc = $_POST['khuvuc'];

    // Tính tổng điểm
    if ($toan <= 0 || $ly <= 0 || $hoa <= 0) {
        $message = "Điểm phải lớn hơn 0 cho tất cả các môn.";
    } elseif ($toan > 10 || $ly > 10 || $hoa > 10) {
        $message = "Điểm phải bé hơn hoặc bằng 10 cho tất cả các môn.";
    } else {
        // Tính tổng điểm
        $tongDiem = $toan + $ly + $hoa;

    // Cộng điểm ưu tiên theo khu vực
    if ($khuvuc == 'KV1' || $khuvuc == 'KV2') {
        $tongDiem += 5;
    } elseif ($khuvuc == 'KV3') {
        $tongDiem += 3;
    }

    // Xếp loại kết quả
    if ($tongDiem >= 24) {
        $xepLoai = "Xuất sắc";
    } elseif ($tongDiem >= 18) {
        $xepLoai = "Giỏi";
    } elseif ($tongDiem >= 15) {
        $xepLoai = "Khá";
    } elseif ($tongDiem >= 10) {
        $xepLoai = "Trung bình";
    } else {
        $xepLoai = "Kém";
    }
}
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp loại kết quả tuyển sinh</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg,rgb(88, 76, 148),rgb(178, 133, 27));
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 450px;
            transition: all 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color:rgb(86, 76, 175);
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: bold;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-top: 15px;
            display: block;
        }

        input[type="number"], select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus, select:focus, textarea:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #fff;
        }

        button {
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            width: 100%;
            background-color:rgb(75, 26, 128);
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:rgb(87, 19, 22);
        }

        .result-container {
            width: 100%;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 16px;
        }

        .result-item {
            margin: 15px 0;
        }

        .result-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
            font-size: 24px;
        }

        .profile-img {
            max-width: 150px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #fff;
        }
        .alert {
            background-color: #f44336; /* Red */
            color: white;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h2>Form xét tuyển sinh</h2>
        <form action="" method="POST">
            <label for="toan">Điểm Toán:</label>
            <input type="number" id="toan" name="toan" min="0" value="<?php echo isset($toan) ? $toan : ''; ?>" required>

            <label for="ly">Điểm Lý:</label>
            <input type="number" id="ly" name="ly" min="0" value="<?php echo isset($ly) ? $ly : ''; ?>" required>

            <label for="hoa">Điểm Hóa:</label>
            <input type="number" id="hoa" name="hoa" min="0" value="<?php echo isset($hoa) ? $hoa : ''; ?>" required>

            <label for="khuvuc">Khu vực:</label>
            <select id="khuvuc" name="khuvuc" required>
                <option value="KV1" <?php echo (isset($khuvuc) && $khuvuc == 'KV1') ? 'selected' : ''; ?>>Khu vực 1</option>
                <option value="KV2" <?php echo (isset($khuvuc) && $khuvuc == 'KV2') ? 'selected' : ''; ?>>Khu vực 2</option>
                <option value="KV3" <?php echo (isset($khuvuc) && $khuvuc == 'KV3') ? 'selected' : ''; ?>>Khu vực 3</option>
                <option value="KV4" <?php echo (isset($khuvuc) && $khuvuc == 'KV4') ? 'selected' : ''; ?>>Khu vực 4 (Không cộng điểm ưu tiên)</option>
            </select>

            <button type="submit">Xếp loại</button>
        </form>

        <?php if (isset($message)): ?>
            <div class="alert">
                <?php echo $message; ?>
            </div>
        <?php elseif (isset($tongDiem)): ?>
            <div class="result-container">
                <h3>Kết quả xét tuyển</h3>
                <div class="result-item"><strong>Tổng điểm:</strong> <?php echo $tongDiem; ?></div>
                <div class="result-item"><strong>Xếp loại:</strong> <?php echo $xepLoai; ?></div>
            </div>
        <?php endif; ?>
    </div>

  

</body>
</html>
