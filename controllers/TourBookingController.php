<?php
// controllers/TourBookingController.php

require_once 'models/TourBookingModel.php';

class TourBookingController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new TourBookingModel($dbConnection);
    }

    public function handleBooking($tourId, $bookingDetails) {
        $availability = $this->model->getTourAvailability($tourId);

        if ($availability >= $bookingDetails['requiredSeats']) {
            // Appeler la méthode createBooking du modèle pour créer la réservation
            // et mettre à jour la disponibilité si nécessaire
            return true; // ou retourner des détails de la réservation
        } else {
            return false; // Pas assez de places disponibles
        }
    }
}
?>