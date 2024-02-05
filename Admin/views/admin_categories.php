<?php
// Chemin : views/admin_categories.php
include('../connection.php');
include('../controllers/CategoryController.php');

session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: admin_login.php");
    exit();
}

$model = new CategoryModel($conn);
$controller = new CategoryController($model);
$categories = $controller->getCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Catégories</title>
    <!-- Inclure les fichiers CSS Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header bg-dark text-white p-4">
            <h1 class="text-center">Gestion des Catégories</h1>
        </div>
        <?php
        // Afficher un message de succès si une opération a été effectuée avec succès.
        if (isset($_GET['success'])) {
            // Votre code de gestion des messages de succès
        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID de la Catégorie</th>
                    <th>Titre de la Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['cat_id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>";
                    echo "<a href='modifier_categorie.php?id=" . $row['cat_id'] . "' class='btn btn-primary'>Modifier</a>";
                    echo "<a href='supprimer_categorie.php?id=" . $row['cat_id'] . "' class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette catégorie ?\")'>Supprimer</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
        <div class="text-center">
            <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter une Catégorie</a>
        </div>
        
        <div class="text-center mt-4">
            <a href="../admin_show.php" class="btn btn-secondary">Retour au Menu Principal</a>
        </div>
    </div>

    <!-- Inclure les fichiers JavaScript Bootstrap (jQuery et Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
