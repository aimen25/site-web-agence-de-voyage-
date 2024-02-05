<?php
// views/verification-disponibilite-chambre.php

require 'config.php'; // Assurez-vous que ce fichier configure la base de données et autres paramètres.
require 'models/RoomModel.php';
require 'controllers/VerificationDisponibiliteChambreController.php';

// Récupération des paramètres POST
$hotelId = isset($_POST['hotel_id']) ? intval($_POST['hotel_id']) : null;
$roomTypeId = isset($_POST['room_type_id']) ? intval($_POST['room_type_id']) : null;
$requiredRoom = isset($_POST['room_available']) ? intval($_POST['room_available']) : null;

// Connexion à la base de données
$dbConnection = new mysqli("localhost", "root", "", "travel_db");
if ($dbConnection->connect_error) {
    die("Erreur de connexion : " . $dbConnection->connect_error);
}

// Initialisation du modèle et du contrôleur
$model = new RoomModel($dbConnection);
$controller = new VerificationDisponibiliteChambreController($model);

// Appel de la méthode de vérification
$disponibilite = $controller->verifierDisponibiliteChambre($hotelId, $roomTypeId, $requiredRoom);

// Affichage du résultat
echo $disponibilite ? "Chambre disponible" : "Désolé. Plus aucune chambre disponible.";
?>