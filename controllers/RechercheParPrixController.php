<?php
// controllers/RechercheParPrixController.php

include_once 'models/HotelModel.php';

class RechercheParPrixController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rechercherHotelsParPrix($minPrice, $maxPrice, $pageno, $noOfRecordsPerPage) {
        $offset = ($pageno - 1) * $noOfRecordsPerPage;
        return [
            'hotels' => $this->model->searchHotelsByPrice($minPrice, $maxPrice, $offset, $noOfRecordsPerPage),
            'totalPages' => ceil($this->model->countHotelsByPrice($minPrice, $maxPrice) / $noOfRecordsPerPage)
        ];
    }
}
?>
