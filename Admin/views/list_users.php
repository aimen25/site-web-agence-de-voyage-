<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs Enregistrés</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Liste des Utilisateurs Enregistrés</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../controllers/UserController.php';
                include_once '../models/UserModel.php';
                include_once '../connection.php'; // Assurez-vous que ce chemin est correct

                $model = new UserModel($conn);
                $controller = new UserController($model);
                $users = $controller->getAllUsers(); // Assurez-vous d'avoir une méthode pour récupérer tous les utilisateurs

                foreach ($users as $row) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td class='text-center'><a href='Admin/adm_user/delete_user.php?email={$row['email']}' class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet utilisateur ?\")'>Supprimer</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="../admin_show.php" class="btn btn-primary">Menu Principal</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
