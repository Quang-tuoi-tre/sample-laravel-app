<!-- <?php include __DIR__ . '/../shares/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="/WEBBANHANG/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>
<ul class="list-group">
    <?php foreach ($products as $product): ?>
        <li class="list-group-item">
            <h2>
                <a href="//app/views/product/show.php/<?php echo $product->id; ?>">
                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </h2>
            <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Danh mục: <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></p>


            <img src="/WEBBANHANG/public/uploads/<?php echo $product->image; ?>" alt="Product Image" style="width: 100px; height: 100px;">

            <a href="/WEBBANHANG/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
            <a href="/WEBBANHANG/Product/delete/<?php echo $product->id; ?>"
               class="btn btn-danger"
               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                Xóa
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../shares/footer.php'; ?> -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="/webbanhang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>
<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    $(document).ready(function() {
        // Gửi yêu cầu GET đến API
        $.get('/WEBBANHANG/api/Product', function(data) {
            // Kiểm tra xem dữ liệu có đúng không
            console.log(data); // In dữ liệu để kiểm tra

            // Kiểm tra nếu dữ liệu hợp lệ
            if (Array.isArray(data) && data.length > 0) {
                const productList = $('#product-list');
                // Duyệt qua danh sách sản phẩm và tạo phần tử <li> cho mỗi sản phẩm
                data.forEach(function(product) {
                    const productItem = `<li class="list-group-item">
                        <h2><a href="/webbanhang/Product/show/${product.id}">${product.name}</a></h2>
                        <p>${product.description}</p>
                        <p>Giá: ${product.price} VND</p>
                        <p>Danh mục: ${product.category_name}</p>
                        <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                        <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                    </li>`;
                    productList.append(productItem);
                });
            } else {
                // Thông báo nếu không có sản phẩm hoặc dữ liệu không hợp lệ
                $('#product-list').html('<li class="list-group-item">Không có sản phẩm nào.</li>');
            }
        }).fail(function() {
            // Thông báo lỗi nếu API không hoạt động
            $('#product-list').html('<li class="list-group-item">Không thể tải danh sách sản phẩm.</li>');
        });
    });

    // Xóa sản phẩm
    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            $.ajax({
                url: `/webbanhang/api/product/${id}`,
                type: 'DELETE',
                success: function(data) {
                    if (data.message === 'Product deleted successfully') {
                        location.reload(); // Tải lại trang để cập nhật danh sách
                    } else {
                        alert('Xóa sản phẩm thất bại');
                    }
                }
            });
        }
    }
</script>
