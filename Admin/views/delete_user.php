<?php

include('../../connection.php'); // Assurez-vous que ce chemin est correct
include('../../models/UserModel.php');
include('../../controllers/UserController.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $userModel = new UserModel($conn);
    $controller = new UserController($userModel);

    if ($controller->deleteUser($email)) {
        header("Location: ../show_users.php"); // Assurez-vous que ce chemin est correct
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "Adresse e-mail non spécifiée.";
}
?>
