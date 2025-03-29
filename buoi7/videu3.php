<?php
// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'salephone');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu sản phẩm
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        header {
            background: #0275d8;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding-bottom: 80px;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 15px;
        }

        .product-info h3 {
            margin: 0;
            color: #333;
        }

        .price {
            color: #e74c3c;
            font-weight: bold;
            margin-top: 10px;
        }

        .desc {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            background: #333;
            color: white;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .product-card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Cửa hàng SalePhone 📱</h1>
</header>

<div class="container">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($row['Image']); ?>" alt="<?php echo htmlspecialchars($row['ProductName']); ?>">
                <div class="product-info">
                    <h3><?php echo htmlspecialchars($row['ProductName']); ?></h3>
                    <div class="price"><?php echo number_format($row['Price'], 0, ',', '.'); ?> VNĐ</div>
                    <div class="desc"><?php echo htmlspecialchars($row['Description']); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Chưa có sản phẩm nào.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
</div>

<footer>
    &copy; 2025 - SalePhone | Designed by me
</footer>
</body>
</html>
