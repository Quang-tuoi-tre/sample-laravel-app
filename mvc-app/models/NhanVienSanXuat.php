<?php
require_once 'NhanVien.php';

class NhanVienSanXuat extends NhanVien {
    public $soSanPham;
    public $tangCa;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap, $soSanPham, $tangCa) {
        parent::__construct($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap);
        $this->soSanPham = $soSanPham;
        $this->tangCa = $tangCa;
    }

    public function tinhLuong() {
        // Logic tính lương cho nhân viên sản xuất, tính theo sản phẩm và tăng ca
        $luongCoBan = parent::tinhLuong();
        $luongSanPham = $this->soSanPham * 50000; // Ví dụ: 50,000 đồng/sản phẩm
        $luongTangCa = $this->tangCa ? 500000 : 0; // Ví dụ: 500,000 đồng nếu có tăng ca
        return $luongCoBan + $luongSanPham + $luongTangCa;
    }
}
?>