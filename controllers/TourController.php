<?php
// controllers/TourController.php

include_once 'models/TourModel.php';

class TourController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getPageData($pageno) {
        $no_of_records_per_page = 6;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        $total_pages = ceil($this->model->getTotalTours() / $no_of_records_per_page);

        return [
            'tours' => $this->model->getTours($offset, $no_of_records_per_page),
            'total_pages' => $total_pages,
            'current_page' => $pageno
        ];
    }

    // Ajoutez d'autres fonctions selon les besoins...
}
?>
