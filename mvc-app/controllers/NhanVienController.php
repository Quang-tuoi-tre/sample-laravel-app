<?php
require_once './models/NhanVienVanPhong.php';
require_once './models/NhanVienSanXuat.php';

class NhanVienController {
    public function tinhLuong() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra sự tồn tại của các phần tử trong $_POST
            $loaiNhanVien = isset($_POST['loaiNhanVien']) ? $_POST['loaiNhanVien'] : '';
            $hoTen = isset($_POST['hoTen']) ? $_POST['hoTen'] : '';
            $ngaySinh = isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : '';
            $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
            $ngayVaoLam = isset($_POST['ngayVaoLam']) ? $_POST['ngayVaoLam'] : '';
            $heSoLuong = isset($_POST['heSoLuong']) ? $_POST['heSoLuong'] : '';
            $soCon = isset($_POST['soCon']) ? $_POST['soCon'] : '';
            $tienLuong = isset($_POST['tienLuong']) ? $_POST['tienLuong'] : '';
            $troCap = isset($_POST['troCap']) ? $_POST['troCap'] : '';

            // Kiểm tra loại nhân viên và khởi tạo đối tượng tương ứng
            if ($loaiNhanVien === 'vanphong') {
                $soNgayVang = isset($_POST['soNgayVang']) ? $_POST['soNgayVang'] : 0;
                $nhanVien = new NhanVienVanPhong($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap, $soNgayVang);
            } elseif ($loaiNhanVien === 'sanxuat') {
                $soSanPham = isset($_POST['soSanPham']) ? $_POST['soSanPham'] : 0;
                $tangCa = isset($_POST['tangCa']);
                $nhanVien = new NhanVienSanXuat($hoTen, $ngaySinh, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $tienLuong, $troCap, $soSanPham, $tangCa);
            }

            // Kiểm tra xem $nhanVien đã được khởi tạo hay chưa
            if (isset($nhanVien)) {
                $thucLanh = $nhanVien->tinhLuong();
                include './views/nhanvien_view.php';
            } else {
                include './views/nhanvien_view.php';
            }
        } else {
            include './views/nhanvien_view.php';
        }
    }
}

$controller = new NhanVienController();
$controller->tinhLuong();
?>