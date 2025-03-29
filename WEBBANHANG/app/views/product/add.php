<!-- <?php include __DIR__ . '/../shares/header.php'; ?>

<h1>Thêm sản phẩm mới</h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form method="POST" action="/WEBBANHANG/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>">
                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="list.php" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include __DIR__ . '/../shares/footer.php';?> -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Thêm sản phẩm mới</h1>
<form id="add-product-form">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    $(document).ready(function() {
        // Tải danh mục từ API
        $.get('/webbanhang/api/category', function(data) {
            const categorySelect = $('#category_id');
            data.forEach(function(category) {
                categorySelect.append(`<option value="${category.id}">${category.name}</option>`);
            });
        });

        // Gửi dữ liệu form để thêm sản phẩm
        $('#add-product-form').submit(function(event) {
            event.preventDefault(); // Ngăn gửi form mặc định

            const formData = $(this).serializeArray();
            const jsonData = {};
            formData.forEach(function(item) {
                jsonData[item.name] = item.value;
            });

            // Gửi yêu cầu POST tới API để thêm sản phẩm
            $.ajax({
                url: '/webbanhang/api/product',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(data) {
                    if (data.message === 'Product created successfully') {
                        location.href = '/webbanhang/Product/list';
                    } else {
                        alert('Thêm sản phẩm thất bại');
                    }
                }
            });
        });
    });
</script>
