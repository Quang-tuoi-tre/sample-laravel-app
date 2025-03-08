<?php
// Khai báo mảng chứa các tin tức với URL và tiêu đề
$listtin = [
    ['https://longnv.name.vn/featured/su-dung-sse-trong-php', 'Sử dụng SSE trong PHP'],
    ['https://longnv.name.vn/featured/phalcon-la-gi', 'Phalcon là gì'],
    ['http://songdep.xitrum.net/trenon/547.html', 'Bạn có bao nhiêu người bạn?'],
    ['http://songdep.xitrum.net/nghethuatsong/876.html', 'Bài học từ loài ngỗng'],
    ['http://songdep.xitrum.net/nghethuatsong/872.html', 'Đường hầm xuyên qua trái đất'],
    ['http://songdep.xitrum.net/ngungon/673.html', 'Tham ăn']
];
?>

<div id="tinxemnhieu">
    <h2>Tin xem nhiều</h2>
    <?php
    $i = 0;
    // Lặp qua mảng và hiển thị thông tin
    while ($i < count($listtin)) {
        $tin = $listtin[$i];
        echo "<p><a href='{$tin[0]}' target='_blank'>{$tin[1]}</a></p>";
        $i++;
    }
    ?>
</div>

<style>
    /* Định dạng cho tin xem nhiều */
#tinxemnhieu {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    margin: 20px auto;
}

#tinxemnhieu h2 {
    font-size: 24px;
    color: #333;
    text-align: center;
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

</style>

