<?php
// Lớp phương trình bậc nhất
class PhuongTrinhBacNhat {
    protected $a;
    protected $b;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function tinhNghiem() {
        if ($this->a == 0) {
            return "Phương trình vô nghiệm hoặc có vô số nghiệm (a không thể bằng 0).";
        }
        $x = -$this->b / $this->a;
        return "Nghiệm của phương trình bậc nhất: x = " . $x;
    }
}

// Lớp phương trình bậc hai kế thừa từ phương trình bậc nhất
class PhuongTrinhBacHai extends PhuongTrinhBacNhat {
    private $c;

    public function __construct($a, $b, $c) {
        parent::__construct($a, $b);
        $this->c = $c;
    }

    public function tinhNghiemBacHai() {
        if ($this->a == 0) {
            return $this->tinhNghiem(); // Gọi phương thức tính nghiệm bậc nhất
        }

        $delta = $this->b * $this->b - 4 * $this->a * $this->c;

        if ($delta > 0) {
            $x1 = (-$this->b + sqrt($delta)) / (2 * $this->a);
            $x2 = (-$this->b - sqrt($delta)) / (2 * $this->a);
            return "Nghiệm bậc hai: x1 = $x1 và x2 = $x2";
        } elseif ($delta == 0) {
            $x = -$this->b / (2 * $this->a);
            return "Nghiệm bậc hai kép: x = $x";
        } else {
            return "Phương trình vô nghiệm.";
        }
    }
}
?>

<?php
// Xử lý khi form được gửi
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = isset($_POST['a']) ? $_POST['a'] : 0;
    $b = isset($_POST['b']) ? $_POST['b'] : 0;
    $c = isset($_POST['c']) ? $_POST['c'] : 0;

    // Kiểm tra phương trình bậc nhất hoặc bậc hai
    if (isset($_POST['type']) && $_POST['type'] == 'bacnhat') {
        // Tính phương trình bậc nhất
        $pt = new PhuongTrinhBacNhat($a, $b);
        $result = $pt->tinhNghiem();
    }

    if (isset($_POST['type']) && $_POST['type'] == 'bachai') {
        // Tính phương trình bậc hai
        if ($c == '') {
            $result = "Vui lòng điền hệ số C để tính phương trình bậc hai.";
        } else {
            $pt2 = new PhuongTrinhBacHai($a, $b, $c);
            $result = $pt2->tinhNghiemBacHai();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương Trình Bậc Nhất và Bậc Hai</title>
    <style>
        /* Reset một số kiểu mặc định */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container Styling */
.container {
    background-color: #fff;
    width: 90%;
    max-width: 600px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

/* Header */
.header {
    text-align: center;
    margin-bottom: 30px;
}

.header h1 {
    font-size: 2.5rem;
    color: #007bff;
}

/* Form Container */
.form-container {
    margin-top: 20px;
}

/* Form Group Styling */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 1rem;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 2px solid #ddd;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    border-color: #007bff;
}

/* Button Styling */
.btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}

/* Result Styling */
.result {
    margin-top: 20px;
    background-color: #f8f9fa;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 20px;
    }

    .header h1 {
        font-size: 2rem;
    }

    .form-group input {
        font-size: 0.9rem;
    }

    .btn {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Phương Trình Bậc Nhất và Bậc Hai</h1>
        </div>
        <div class="form-container">
            <h2>Nhập hệ số và tính nghiệm</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="a">Hệ số A:</label>
                    <input type="number" id="a" name="a" required>
                </div>
                <div class="form-group">
                    <label for="b">Hệ số B:</label>
                    <input type="number" id="b" name="b" required>
                </div>
                <div class="form-group">
                    <label for="c">Hệ số C (Chỉ yêu cầu nếu tính phương trình bậc hai):</label>
                    <input type="number" id="c" name="c">
                </div>
                <div class="form-group">
                    <label for="type">Chọn loại phương trình:</label>
                    <select id="type" name="type">
                        <option value="bacnhat">Phương trình bậc nhất</option>
                        <option value="bachai">Phương trình bậc hai</option>
                    </select>
                </div>
                <button type="submit" class="btn">Tính nghiệm</button>
            </form>

            <?php if ($result): ?>
                <div class="result">
                    <h3>Kết quả:</h3>
                    <p><?php echo $result; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
