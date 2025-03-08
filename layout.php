<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Layout</title>
    <link rel="stylesheet" href="style.css"> <!-- Link đến file CSS -->
    <style>
        /* Reset some default styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Cấu trúc tổng thể */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Layout container */
        .container {
            width: 80%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 36px;
            font-weight: 700;
        }

        /* Main Content */
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .content > div {
            width: 48%;
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
        }

        footer p {
            font-size: 16px;
        }

        /* CSS cho tin xem nhiều */
        #tinxemnhieu {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #tinxemnhieu h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        #tinxemnhieu p {
            font-size: 16px;
            line-height: 1.5;
            margin: 5px 0;
        }

        #tinxemnhieu a {
            color: #007bff;
            text-decoration: none;
        }

        #tinxemnhieu a:hover {
            text-decoration: underline;
        }

        /* CSS cho liên kết website */
        #lienketwebsite {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #lienketwebsite h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        #lienketwebsite select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        #lienketwebsite select:focus {
            border-color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <header>
        <h1>Trang Web Của Tôi</h1>
    </header>

    <!-- Main content -->
    <main class="content">
        <!-- Tin xem nhiều -->
        <div>
            <?php include('tinxemnhieu.php'); ?>
        </div>
        
        <!-- Liên kết website -->
        <div>
            <?php include('lienketwebsite.php'); ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Trang Web Của Tôi</p>
    </footer>
</div>

</body>
</html>
