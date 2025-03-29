<!-- <?php include __DIR__ . '/../shares/header.php'; ?>

<h1>Sửa sản phẩm</h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form method="POST" action="/WEBBANHANG/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control"
               value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"
                  required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01"
               value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh (Chọn nếu muốn thay đổi):</label>
        <input type="file" id="image" name="image" class="form-control">
        
        <?php if ($product->image): ?>
            <div>
                <p>Hình ảnh hiện tại:</p>
                <img src="/WEBBANHANG/public/uploads/<?php echo $product->image; ?>" alt="Product Image" style="width: 100px; height: 100px;">
                </div>
        <?php else: ?>
            <p>Chưa có hình ảnh sản phẩm</p>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/WEBBANHANG/Product" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include __DIR__ . '/../shares/footer.php'; ?> -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa sản phẩm</h1>
<form id="edit-product-form">
    <input type="hidden" id="id" name="id">
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
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/webbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    $(document).ready(function() {
        const productId = <?= $editId ?>;

        // Tải thông tin sản phẩm từ API
        $.get(`/webbanhang/api/product/${productId}`, function(data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#description').val(data.description);
            $('#price').val(data.price);
            $('#category_id').val(data.category_id);
        });

        // Tải danh mục từ API
        $.get('/webbanhang/api/category', function(data) {
            const categorySelect = $('#category_id');
            data.forEach(function(category) {
                categorySelect.append(`<option value="${category.id}">${category.name}</option>`);
            });
        });

        // Gửi yêu cầu cập nhật sản phẩm
        $('#edit-product-form').submit(function(event) {
            event.preventDefault(); // Ngăn gửi form mặc định

            const formData = $(this).serializeArray();
            const jsonData = {};
            formData.forEach(function(item) {
                jsonData[item.name] = item.value;
            });

            // Gửi yêu cầu PUT để cập nhật sản phẩm
            $.ajax({
                url: `/webbanhang/api/product/${jsonData.id}`,
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(jsonData),
                success: function(data) {
                    if (data.message === 'Product updated successfully') {
                        location.href = '/webbanhang/Product/list';
                    } else {
                        alert('Cập nhật sản phẩm thất bại');
                    }
                }
            });
        });
    });
</script>
