<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân Viên</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 600px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-nhanvien {
    display: flex;
    flex-direction: column;
}

.form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

label {
    width: 150px;
    text-align: right;
    padding-right: 10px;
}

input[type="text"],
input[type="number"],
input[type="date"] {
    width: 200px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="radio"],
input[type="checkbox"] {
    margin: 0 5px;
}

button {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    align-self: center;
}

button:hover {
    background-color: #0056b3;
}
/* ... (các style trước) ... */

.result-container {
    margin-top: 20px;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 4px;
}

.result-container h2 {
    text-align: center;
    margin-bottom: 15px;
}

.result-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.result-row label {
    font-weight: bold;
    width: 150px;
    text-align: right;
    padding-right: 10px;
}

.result-row span {
    width: 200px;
    padding: 8px;
    border: 1px solid #eee;
    border-radius: 4px;
    background-color: #f9f9f9;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>QUẢN LÝ NHÂN VIÊN</h1>
        <form method="post" class="form-nhanvien">
            <div class="form-row">
                <label>Họ và tên:</label>
                <input type="text" name="hoTen" value="<?php echo isset($_POST['hoTen']) ? $_POST['hoTen'] : ''; ?>">
                <label>Số con:</label>
                <input type="number" name="soCon" value="<?php echo isset($_POST['soCon']) ? $_POST['soCon'] : ''; ?>">
            </div>
            <div class="form-row">
                <label>Ngày sinh:</label>
                <input type="date" name="ngaySinh" value="<?php echo isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : ''; ?>">
                <label>Ngày vào làm:</label>
                <input type="number" name="ngayVaoLam" value="<?php echo isset($_POST['ngayVaoLam']) ? $_POST['ngayVaoLam'] : ''; ?>">
            </div>
            <div class="form-row">
                <label>Giới tính:</label>
                <input type="radio" name="gioiTinh" value="nam" <?php echo (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] === 'nam') ? 'checked' : ''; ?>> Nam
                <input type="radio" name="gioiTinh" value="nu" <?php echo (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] === 'nu') ? 'checked' : ''; ?>> Nữ
                <label>Hệ số lương:</label>
                <input type="number" name="heSoLuong" step="0.01" value="<?php echo isset($_POST['heSoLuong']) ? $_POST['heSoLuong'] : ''; ?>">
            </div>
           
            
            <div class="form-row">
                <label>Loại nhân viên:</label>
                <input type="radio" name="loaiNhanVien" value="vanphong" <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] === 'vanphong') ? 'checked' : ''; ?> onclick="toggleFields()"> Văn phòng
                <input type="radio" name="loaiNhanVien" value="sanxuat" <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] === 'sanxuat') ? 'checked' : ''; ?> onclick="toggleFields()"> Sản xuất
            </div>
            
            <div class="form-row" id="soNgayVangDiv" style="display: <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] === 'vanphong') ? 'flex' : 'none'; ?>">
                <label>Số ngày vắng:</label>
                <input type="number" name="soNgayVang" value="<?php echo isset($_POST['soNgayVang']) ? $_POST['soNgayVang'] : ''; ?>">
            </div>

            <div class="form-row" id="soSanPhamDiv" style="display: <?php echo (isset($_POST['loaiNhanVien']) && $_POST['loaiNhanVien'] === 'sanxuat') ? 'flex' : 'none'; ?>">
                <label>Số sản phẩm:</label>
                <input type="number" name="soSanPham" value="<?php echo isset($_POST['soSanPham']) ? $_POST['soSanPham'] : ''; ?>">
                <label>Tăng ca:</label>
                <input type="checkbox" name="tangCa" <?php echo isset($_POST['tangCa']) ? 'checked' : ''; ?>>
            </div>
            
            <div class="form-row">
                <label>Tiền lương:</label>
                <input type="number" name="tienLuong" value="<?php echo isset($_POST['tienLuong']) ? $_POST['tienLuong'] : ''; ?>">
                <label>Trợ cấp:</label>
                <input type="number" name="troCap" value="<?php echo isset($_POST['troCap']) ? $_POST['troCap'] : ''; ?>">
            </div>
            <div class="form-row">
                <label>Thực lãnh:</label>
                <input type="text" value="<?php echo isset($thucLanh) ? number_format($thucLanh) . ' đồng' : ''; ?>" readonly>
            </div>
            <div class="form-row">
                <button type="submit">Tính lương</button>
            </div>
        </form>

        <?php if (isset($thucLanh)) : ?>
            <?php endif; ?>
    </div>

    <script>
        function toggleFields() {
            var loaiNhanVien = document.querySelector('input[name="loaiNhanVien"]:checked').value;
            var soNgayVangDiv = document.getElementById('soNgayVangDiv');
            var soSanPhamDiv = document.getElementById('soSanPhamDiv');

            if (loaiNhanVien === 'vanphong') {
                soNgayVangDiv.style.display = 'flex';
                soSanPhamDiv.style.display = 'none';
            } else if (loaiNhanVien === 'sanxuat') {
                soNgayVangDiv.style.display = 'none';
                soSanPhamDiv.style.display = 'flex';
            }
        }
    </script>
</body>
</html>
