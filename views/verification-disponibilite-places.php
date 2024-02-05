<?php
// views/verification-disponibilite-places.php

require 'config.php';
require 'controllers/VerificationDisponibiliteController.php';

$tourId = isset($_POST['tour_id']) ? intval($_POST['tour_id']) : null;
$requiredSeat = isset($_POST['seat_available']) ? intval($_POST['seat_available']) : null;

$dbConnection = new mysqli("localhost", "root", "", "travel_db");
$model = new TourModel($dbConnection);
$controller = new VerificationDisponibiliteController($model);

$disponibilite = $controller->verifierDisponibilite($tourId, $requiredSeat);

echo $disponibilite ? "Places disponibles" : "Désolé, plus de places disponibles.";
?>
