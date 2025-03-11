<?php
class NhanVien {
    public $hoTen;
    public $ngaySinh;
    public $gioiTinh;
    public $ngayVaoLam;
    public $heSoLuong;
    public $soCon;
    public $tienLuong;
    public $troCap;

    public function __construct($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap) {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->gioiTinh = $gioiTinh;
        $this->ngayVaoLam = $ngayVaoLam;
        $this->heSoLuong = $heSoLuong;
        $this->soCon = $soCon;
        $this->tienLuong = $tienLuong;
        $this->troCap = $troCap;
    }

    public function tinhLuong() {
        // Logic tính lương cơ bản (có thể được ghi đè trong các lớp con)
        return $this->tienLuong + $this->troCap;
    }
}
?> 