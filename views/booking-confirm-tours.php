<?php
// booking-confirm-tour.php

session_start();
require 'config.php'; // Fichier de connexion à la base de données
require 'controllers/TourBookingController.php';

$tourId = $_SESSION['tour_id'];
$bookingDetails = [
    // Récupérez et assainissez les détails de réservation ici
    'requiredSeats' => $_SESSION['enq_tour_child'] + $_SESSION['enq_tour_adult']
];

$controller = new TourBookingController($mysqli); // Assurez-vous que $mysqli est votre objet de connexion à la base de données
$bookingStatus = $controller->handleBooking($tourId, $bookingDetails);

require 'views/booking-confirm-tour.php'; // Fichier de vue pour afficher la confirmation ou l'erreur
?>