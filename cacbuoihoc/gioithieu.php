<?php 
    $ho="Hồ Nhật";
    $ten="Quang";
    $ngaysinh="11/01/2003";
    $diem=3;
    
    if ($diem >= 9) $xeploai = "Xuất sắc";
else if ($diem >= 8) $xeploai = "Giỏi";
else if ($diem >= 6.5) $xeploai = "Khá";
else if ($diem >= 5) $xeploai = "Trung bình";
else if ($diem >= 3.5) $xeploai = "Yếu";
else $xeploai = "Kém";


// $a = array(4,6,8);
// for($i=0; $i,count($a);$i++){
//     echo $a[$i];
// }



?>

<?php 
    $a = array('ac'=> 1,2,3,4);
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ff4d4d;
            color: white;
            border-radius: 10px;
        }

        .header {
            text-align: center;
            font-size: 24px;
            background-color: #cc0000;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }

        .content {
            background-color: #006400;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            color: white;
        }

        .content p {
            margin: 10px 0;
            font-size: 18px;
        }

        .content span {
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            THÔNG TIN SINH VIÊN
        </div>
        <div class="content">
        <p><span>Họ tên </span>: <?php echo $ho. " " . $ten; ?> </p>
    <p><span>Ngày sinh </span>: <?php echo $ngaysinh; ?> </p>
    <p><span>Điểm </span>: <?php echo $diem; ?> </p>
    <p><span>Xếp loại </span>: <?php echo $xeploai; ?> </p>
        </div>
    </div>

</body>
</html>

