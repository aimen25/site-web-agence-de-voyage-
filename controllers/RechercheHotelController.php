<?php
// controllers/RechercheHotelController.php

include_once 'models/HotelModel.php';

class RechercheHotelController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rechercherHotels($location, $pageno, $noOfRecordsPerPage) {
        $offset = ($pageno - 1) * $noOfRecordsPerPage;
        return [
            'hotels' => $this->model->searchHotelsByLocation($location, $offset, $noOfRecordsPerPage),
            'totalPages' => ceil($this->model->countHotelsByLocation($location) / $noOfRecordsPerPage)
        ];
    }
}
?>
