<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";

    // Constructor để khởi tạo kết nối cơ sở dữ liệu
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Phương thức để lấy danh sách danh mục
    public function getCategories()
    {
        $query = "SELECT id, name, description FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>