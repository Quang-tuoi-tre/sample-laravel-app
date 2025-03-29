<?php 
require_once('app/config/database.php'); 
require_once('app/models/ProductModel.php'); 
require_once('app/models/CategoryModel.php'); 
 

 
class ProductApiController 
{ 
    private $productModel; 
    private $db; 
 
    public function __construct() 
    { 
        $this->db = (new Database())->getConnection(); 
        $this->productModel = new ProductModel($this->db); 
    } 
 
    // Lấy danh sách sản phẩm 
    public function index() 
    { 
        header('Content-Type: application/json'); 
        $products = $this->productModel->getProducts(); 
        echo json_encode($products); 
    } 
 
    // Lấy thông tin sản phẩm theo ID 
    public function show($id) 
    { 
        header('Content-Type: application/json'); 
        $product = $this->productModel->getProductById($id); 
        if ($product) { 
            echo json_encode($product); 
        } else { 
            http_response_code(404); 
            echo json_encode(['message' => 'Product not found']); 
        } 
    } 
 
    // Thêm sản phẩm mới 
    // Trong ProductApiController.php
// Hàm store trong ProductApiController
public function store() {
    $data = json_decode(file_get_contents("php://input"), true); // Lấy dữ liệu gửi lên
    
    if (!isset($data['name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category_id'])) {
        echo json_encode(["message" => "Thiếu dữ liệu"]);
        return;
    }

    $name = $data['name'];
    $description = $data['description'];
    $price = $data['price'];
    $category_id = $data['category_id']; // Sử dụng category_id thay vì category_name

    // Thêm sản phẩm mới vào database
    $productModel = new ProductModel($this->db);
    $result = $productModel->addProduct($name, $description, $price, $category_id);

    if ($result) {
        echo json_encode(["message" => "Product created successfully"]);
    } else {
        echo json_encode(["message" => "Failed to create product"]);
    }
}


 
    // Cập nhật sản phẩm theo ID 
   // Trong ProductApiController.php
// Cập nhật sản phẩm theo ID 
public function update($id) {
    // Đọc dữ liệu JSON từ request body
    $data = json_decode(file_get_contents("php://input"), true); // Lấy dữ liệu gửi lên
    
    // Kiểm tra xem các trường dữ liệu cần thiết có tồn tại không
    if (!isset($data['name']) || !isset($data['description']) || !isset($data['price']) || !isset($data['category_id'])) {
        echo json_encode(["message" => "Thiếu dữ liệu"]);
        return;
    }

    // Lấy dữ liệu từ API request
    $name = $data['name'];
    $description = $data['description'];
    $price = $data['price'];
    $category_id = $data['category_id']; // Lấy category_id từ dữ liệu gửi lên

    // Cập nhật sản phẩm trong database
    $productModel = new ProductModel($this->db);
    $result = $productModel->updateProduct($id, $name, $description, $price, $category_id);

    // Kiểm tra xem cập nhật sản phẩm thành công hay không
    if ($result) {
        echo json_encode(["message" => "Product updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update product"]);
    }
}

 
 
    // Xóa sản phẩm theo ID 
    public function destroy($id) 
    { 
        header('Content-Type: application/json'); 
        $result = $this->productModel->deleteProduct($id); 
 
        if ($result) { 
            echo json_encode(['message' => 'Product deleted successfully']); 
        } else { 
            http_response_code(400); 
            echo json_encode(['message' => 'Product deletion failed']); 
        } 
    } 
} 
?>