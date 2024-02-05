<?php
// controllers/VerificationDisponibiliteController.php

include_once 'models/TourModel.php';

class VerificationDisponibiliteController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function verifierDisponibilite($tourId, $requiredSeat) {
        return $this->model->checkSeatAvailability($tourId, $requiredSeat);
    }
}
?>
