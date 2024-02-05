<?php 
class CategoryModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getAllCategories() {
        $categories = [];
        $sql = "SELECT * FROM categories";
        $result = $this->dbConnection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }
        return $categories;
    }

    public function addCategory($title) {
        $sql = "INSERT INTO categories (title) VALUES (?)";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteCategoryById($id) {
        $sql = "DELETE FROM categories WHERE cat_id = ?";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateCategoryById($id, $newTitle) {
        $sql = "UPDATE categories SET title = ? WHERE cat_id = ?";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("si", $newTitle, $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>