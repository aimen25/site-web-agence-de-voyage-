<?php
include('RoomController.php');

$controller = new RoomController();
$result = $controller->getRooms();

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
    <title>Liste des Offres de Chambres</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <div class="container">
        <h1 class="bg-dark text-white p-4 text-center">Liste des Offres de Chambres</h1>
        
        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <!-- En-têtes du tableau -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Affichage des données de chaque chambre
                    }
                } else {
                    echo "<tr><td colspan='8'>Aucun résultat trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <!-- Autres éléments de la page -->
    </div>

    <!-- Inclusion des scripts JavaScript -->
</body>
</html>

