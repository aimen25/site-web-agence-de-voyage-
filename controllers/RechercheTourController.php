<?php
// controllers/RechercheTourController.php

include_once 'models/TourModel.php';

class RechercheTourController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rechercherTours($location, $pageno, $noOfRecordsPerPage) {
        $offset = ($pageno - 1) * $noOfRecordsPerPage;
        return [
            'tours' => $this->model->searchToursByLocation($location, $offset, $noOfRecordsPerPage),
            'totalPages' => ceil($this->model->countToursByLocation($location) / $noOfRecordsPerPage)
        ];
    }
}
?>
