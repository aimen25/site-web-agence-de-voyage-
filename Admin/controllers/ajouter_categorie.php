<?php
include('../connection.php');
include('../controllers/CategoryController.php');

session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: admin_login.php");
    exit();
}

$model = new CategoryModel($conn);
$controller = new CategoryController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];

    // Ajout de la catégorie via le contrôleur
    $result = $controller->addCategory($title);

    if ($result) {
        header("Location: admin_categories.php?success=1");
        exit;
    } else {
        $error = "Erreur lors de l'ajout de la catégorie.";
    }
}
?>
