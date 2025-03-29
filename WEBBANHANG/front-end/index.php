<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
      body { padding: 20px; }
      .action-btn { margin-right: 5px; }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center">Danh sách sản phẩm</h2>
    <!-- Bảng hiển thị sản phẩm -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Mô tả</th>
          <th>Giá</th>
          <th>Danh mục</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody id="product-list">
        <!-- Dữ liệu sẽ được load vào đây -->
      </tbody>
    </table>
    
    <!-- Form thêm/sửa sản phẩm -->
    <h3 id="form-title">Thêm sản phẩm</h3>
    <form id="product-form">
      <input type="hidden" id="product-id" value="">
      <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" required></textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <input type="number" class="form-control" id="price" step="0.01" required>
      </div>
      <div class="mb-3">
      <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
      <button type="button" id="cancel-edit" class="btn btn-secondary" style="display: none;">Hủy</button>
    </form>
  </div>

  <script>
    const API_URL = "http://localhost/WEBBANHANG/api/product";
    
    fetch('/webbanhang/api/category')
    .then(response => response.json()) // Chuyển đổi phản hồi thành JSON
    .then(data => {
        const categorySelect = document.getElementById('category_id'); // Lấy thẻ select
        data.forEach(category => {
            const option = document.createElement('option'); // Tạo phần tử <option>
            option.value = category.id;  // Gán giá trị của option là ID của danh mục
            option.textContent = category.name; // Hiển thị tên danh mục trong option
            categorySelect.appendChild(option); // Thêm phần tử option vào thẻ select
        });
    })
    .catch(error => {
        console.error("Lỗi khi tải danh mục:", error); // In lỗi nếu có sự cố
    });

    // Load danh sách sản phẩm
    function loadProducts() {
      $.ajax({
        url: API_URL,
        method: "GET",
        dataType: "json",
        success: function(response) {
          let html = "";
          $.each(response, function(index, product) {
            html += `
              <tr>
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.description}</td>
                <td>${parseFloat(product.price).toFixed(3)} VND</td>
                <td>${product.category_name}</td>
                <td>
<button class="btn btn-warning btn-sm action-btn edit-btn" data-id="${product.id}" data-name="${product.name}" data-description="${product.description}" data-price="${product.price}" data-category="${product.category_name}">Sửa</button>
                  <button class="btn btn-danger btn-sm action-btn delete-btn" data-id="${product.id}">Xóa</button>
                </td>
              </tr>
            `;
          });
          $("#product-list").html(html);
        },
        error: function(xhr, status, error) {
          console.error("Lỗi khi gọi API:", error);
          console.log("Phản hồi từ server:", xhr.responseText);
        }
      });
    }
    
    // Xử lý thêm hoặc sửa sản phẩm
    $("#product-form").submit(function(e) {
  e.preventDefault();
  
  const id = $("#product-id").val();
  const data = {
    name: $("#name").val(),
    description: $("#description").val(),
    price: $("#price").val(),
    category_id: $("#category_id").val() // API cần xử lý logic chuyển tên danh mục thành id nếu cần
  };
  
  if (id === "") {
    // Thêm sản phẩm mới
    $.ajax({
  url: API_URL,
  method: "POST",  // Sử dụng POST để thêm sản phẩm mới
  dataType: "json",
  data: JSON.stringify(data),  // Chuyển dữ liệu thành JSON
  contentType: "application/json",  // Cấu hình content type là application/json
  success: function(response) {
    alert("Thêm sản phẩm thành công");
    $("#product-form")[0].reset();
    loadProducts();  // Tải lại danh sách sản phẩm
  },
  error: function(xhr, status, error) {
    console.error("Lỗi khi thêm sản phẩm:", error);
    console.log("Phản hồi từ server:", xhr.responseText);
  }
});

  } else {
    // Sửa sản phẩm, sử dụng PUT
    $.ajax({
      url: API_URL + "/" + id,
      method: "PUT",  // hoặc "PATCH" nếu API của bạn hỗ trợ
      dataType: "json",
      data: JSON.stringify(data),
      contentType: "application/json", // Cấu hình content type là application/json
      success: function(response) {
        alert("Cập nhật sản phẩm thành công");
        $("#product-form")[0].reset();
        $("#form-title").text("Thêm sản phẩm");
        $("#cancel-edit").hide();
        loadProducts();
      },
      error: function(xhr, status, error) {
        console.error("Lỗi khi cập nhật sản phẩm:", error);
        console.log("Phản hồi từ server:", xhr.responseText);
      }
    });
  }
});

    
    // Xử lý nút xóa
    $(document).on("click", ".delete-btn", function() {
      const id = $(this).data("id");
      if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
        $.ajax({
          url: API_URL + "/" + id,
          method: "DELETE",
          dataType: "json",
          success: function(response) {
            alert("Xóa sản phẩm thành công");
            loadProducts();
          },
          error: function(xhr, status, error) {
console.error("Lỗi khi xóa sản phẩm:", error);
            console.log("Phản hồi từ server:", xhr.responseText);
          }
        });
      }
    });
    
    // Xử lý nút sửa: điền dữ liệu vào form
    $(document).on("click", ".edit-btn", function() {
      const id = $(this).data("id");
      const name = $(this).data("name");
      const description = $(this).data("description");
      const price = $(this).data("price");
      const category = $(this).data("category");
      
      $("#product-id").val(id);
      $("#name").val(name);
      $("#description").val(description);
      $("#price").val(price);
      $("#category_name").val(category);
      $("#form-title").text("Sửa sản phẩm");
      $("#cancel-edit").show();
    });
    
    // Nút hủy sửa: reset form
    $("#cancel-edit").click(function() {
      $("#product-form")[0].reset();
      $("#product-id").val("");
      $("#form-title").text("Thêm sản phẩm");
      $(this).hide();
    });
    
    // Load sản phẩm khi trang được tải
    $(document).ready(function() {
      loadProducts();
    });
  </script>
</body>
</html>