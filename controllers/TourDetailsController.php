<?php
// controllers/TourDetailsController.php

include_once 'models/TourDetailsModel.php';

class TourDetailsController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function displayTour($tourId) {
        return $this->model->getTourDetails($tourId);
    }
}
?>
