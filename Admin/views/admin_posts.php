<?php
include('../connection.php');
include('../controllers/PostController.php');
include('../models/PostModel.php');

$model = new PostModel($conn);
$controller = new PostController($model);
$posts = $controller->getPosts();

session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Posts</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Votre code CSS ici -->
</head>
<body>
    <div class="container">
        <div class="bg-dark text-white p-4">
            <h1 class="text-center">Liste des Postes</h1>
        </div>
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID du Post</th>
                    <th>Catégorie</th>
                    <th>Titre</th>
                    <th>Date d'Ajout</th>
                    <th>Ajouté Par</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?php echo $post['post_id']; ?></td>
                        <td><?php echo $post['cat_id']; ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['addedOn']; ?></td>
                        <td><?php echo $post['addedBy']; ?></td>
                        <td>
                            <a href="delete_post.php?id=<?php echo $post['post_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="ajouter_post.php" class="btn btn-primary">Ajouter un Post</a>
        <a href="../admin_show.php" class="btn btn-secondary">Menu Principal</a>
    </div>
</body>
</html>
