<?php
include('../connection.php');
include('../controllers/PostController.php');
include('../models/PostModel.php');

$model = new PostModel($conn);
$controller = new PostController($model);

session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_id = $_POST['cat_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $addedBy = 'admin'; // Exemple d'utilisateur ajoutant le post

    // Gestion du téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        // ... (code de téléchargement de l'image)
        if ($controller->addPost($cat_id, $title, $description, $image_name, $addedBy)) {
            header("Location: admin_posts.php?success=1");
            exit;
        } else {
            echo "Erreur lors de l'ajout du post.";
        }
    }
}

// ... (le reste du code HTML du formulaire)
