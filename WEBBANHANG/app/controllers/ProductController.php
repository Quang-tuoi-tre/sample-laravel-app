<?php
// Require Database và các Model cần thiết
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);

        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function add()
    {
        // $products = $this->productModel->getProducts();

        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            $image = $_FILES['image'] ?? null;  // Lấy thông tin hình ảnh từ $_FILES
    
            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);
    
            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /WEBBANHANG/Product');
            }
        }
    }
    
    

    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();

        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
    
            // Xử lý hình ảnh nếu có
            $image = $_POST['current_image'];  // Lưu hình ảnh cũ nếu không thay đổi
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
    
                // Kiểm tra định dạng hình ảnh
                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array(strtolower($imageExt), $allowedExts)) {
                    $imagePath = 'uploads/' . time() . '_' . $imageName;
                    move_uploaded_file($imageTmpPath, 'public/' . $imagePath);
    
                    // Cập nhật hình ảnh mới
                    $image = $imagePath;
                }
            }
    
            // Lấy thông tin sản phẩm hiện tại từ cơ sở dữ liệu
$product = $this->productModel->getProductById($id);
$current_image = $product->image;  // Lấy ảnh hiện tại

// Sau đó gọi phương thức updateProduct với ảnh hiện tại nếu không có ảnh mới
$result = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image, $current_image);

    
            if ($result) {
                header('Location: /WEBBANHANG/Product');
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }
    

    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /WEBBANHANG/Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
}
?>
