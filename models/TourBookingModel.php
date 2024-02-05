<?php
// models/TourBookingModel.php

class TourBookingModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getTourAvailability($tourId) {
        $statement = $this->dbConnection->prepare("SELECT available FROM tours WHERE tour_id = ? AND deletedAt IS NULL");
        $statement->bind_param("i", $tourId);
        $statement->execute();
        $result = $statement->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['available'];
        } else {
            return null;
        }
    }

    public function createBooking($tourId, /* Autres paramètres */) {
        // Logique de création d'une réservation
    }
}
?>
