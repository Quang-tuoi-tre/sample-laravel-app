<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCategories()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function getCategoryByName($category_name)
    {
        // Tạo câu truy vấn SQL để tìm danh mục theo tên
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = :name LIMIT 1";
        
        // Chuẩn bị câu truy vấn
        $stmt = $this->conn->prepare($query);

        // Ràng buộc tham số
        $stmt->bindParam(':name', $category_name);

        // Thực thi câu truy vấn
        $stmt->execute();

        // Kiểm tra nếu tìm thấy danh mục
        if ($stmt->rowCount() > 0) {
            // Trả về kết quả dưới dạng đối tượng
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        // Nếu không tìm thấy danh mục, trả về null
        return null;
    }

    public function addCategory($name, $description)
    {
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên danh mục không được để trống';
        }
        if (empty($description)) {
            $errors['description'] = 'Mô tả không được để trống';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        $query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
        $stmt = $this->conn->prepare($query);

        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        return $stmt->execute();
    }

    public function updateCategory($id, $name, $description)
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        return $stmt->execute();
    }

    public function deleteCategory($id)
{
    // Bước 1: Lấy danh sách các sản phẩm liên kết với danh mục cần xóa
    $query = "SELECT image FROM product WHERE category_id = :category_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':category_id', $id);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Bước 2: Xóa các ảnh của sản phẩm trong thư mục uploads
    foreach ($products as $product) {
        $image_path = __DIR__ . '/../../public/uploads/' . $product->image;
        if (file_exists($image_path)) {
            unlink($image_path); // Xóa ảnh trong thư mục uploads
        }
    }

    // Bước 3: Xóa các sản phẩm có category_id liên kết
    $deleteProductsQuery = "DELETE FROM product WHERE category_id = :category_id";
    $stmt = $this->conn->prepare($deleteProductsQuery);
    $stmt->bindParam(':category_id', $id);
    $stmt->execute();
    
    // Bước 4: Xóa danh mục
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

    
}
?>
