<?php
// controllers/subscribe_handler.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["EMAIL"])) {
    $email = filter_input(INPUT_POST, "EMAIL", FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connectez-vous à la base de données
        include 'config.php'; // Assurez-vous que ce fichier contient les bonnes informations de connexion à la base de données

        // Insérez l'e-mail dans la base de données
        $query = $dbConnection->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $query->bind_param("s", $email);
        $query->execute();

        if ($query->affected_rows > 0) {
            echo "Merci pour votre inscription !";
        } else {
            echo "Une erreur est survenue. Veuillez réessayer.";
        }
    } else {
        echo "Adresse e-mail invalide.";
    }
} else {
    // Redirection si le script est accédé sans soumettre le formulaire
    header("Location: index.php");
    exit();
}
?>
