<?php
require_once 'NhanVien.php';

class NhanVienVanPhong extends NhanVien {
    public $soNgayVang;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap, $soNgayVang) {
        parent::__construct($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap);
        $this->soNgayVang = $soNgayVang;
    }

    public function tinhLuong() {
        // Logic tính lương cho nhân viên văn phòng, trừ tiền vắng
        $luongCoBan = parent::tinhLuong();
        return $luongCoBan - ($this->soNgayVang * 100000); // Ví dụ: 100,000 đồng/ngày vắng
    }
}
?>