<?php
$links = [
    ['http://google.com', 'Google'],
    ['http://w3schools.com', 'W3Schools'],
    ['https://longnv.name.vn', 'Thầy Long Web'],
    ['http://vnexpress.net', 'VnExpress'],
    ['http://tuoitre.vn', 'Tuổi trẻ'],
    ['http://thanhnien.vn', 'Thanh niên'],
    ['http://youtube.com', 'Youtube']
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên kết Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #lienketwebsite {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        select:focus {
            border-color: #4CAF50;
        }
        h2 {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

<div id="lienketwebsite">
    <h2>Liên kết Website</h2>
    <select onchange="window.open(this.value)">
        <?php
        foreach ($links as $link) {
            $selected = $link[1] === 'W3Schools' ? 'selected' : '';
            echo "<option value='{$link[0]}' {$selected}>{$link[1]}</option>";
        }        
        ?>
    </select>
</div>

</body>
</html>
