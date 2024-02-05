<?php
// view_categories.php
include('../connection.php');
include('../controllers/CategoryController.php');

$model = new CategoryModel($conn);
$controller = new CategoryController($model);
$categories = $controller->getCategories();

// Affichage des catégories
foreach ($categories as $category) {
    echo $category['title'] . "<br>";
}

// Ajouter une catégorie
if (isset($_POST['addCategory'])) {
    $controller->addCategory($_POST['newCategoryTitle']);
}

// Supprimer une catégorie
if (isset($_POST['deleteCategory'])) {
    $controller->deleteCategory($_POST['categoryIdToDelete']);
}

// Mettre à jour une catégorie
if (isset($_POST['updateCategory'])) {
    $controller->updateCategory($_POST['categoryIdToUpdate'], $_POST['newCategoryTitle']);
}
?>