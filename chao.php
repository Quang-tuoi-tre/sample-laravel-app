

<div id="chao" >
<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $h = intval(gmdate("H")) + 7; 
    if($h<=12){
        echo "<span class ='sang'>Bây giờ là $h giờ sáng ! Chúc 1 ngày tốt lành </span>" ;
    }
    else if($h<=17){
        echo "<span class ='chieu'>Bây giờ là $h giờ chiều ! Chúc bạn vui </span>" ;

    }
    
    else{
        echo "<span class ='chieu'>Bây giờ là $h giờ tối ! Chúc bạn ngủ ngon </span>" ;
    }
?>
</div>

<style>
    /* Định dạng cho lời chào sáng */
.sang {
    font-size: 20px;
    color: #FF6347; /* Màu cam */
    font-weight: bold;
    background-color: #FFF8DC; /* Màu nền sáng */
    padding: 10px;
    border-radius: 8px;
    text-align: center;
    margin-top: 20px;
}

/* Định dạng cho lời chào chiều */
.chieu {
    font-size: 20px;
    color: #4682B4; /* Màu xanh biển */
    font-weight: bold;
    background-color: #E0FFFF; /* Màu nền xanh nhạt */
    padding: 10px;
    border-radius: 8px;
    text-align: center;
    margin-top: 20px;
}

</style>