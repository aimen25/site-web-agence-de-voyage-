<?php
include_once '../models/CategoryModel.php';

class CategoryController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getCategories() {
        return $this->model->getAllCategories();
    }

    public function addCategory($title) {
        return $this->model->addCategory($title);
    }

    public function deleteCategory($id) {
        return $this->model->deleteCategoryById($id);
    }

    public function updateCategory($id, $newTitle) {
        return $this->model->updateCategoryById($id, $newTitle);
    }
}
?>