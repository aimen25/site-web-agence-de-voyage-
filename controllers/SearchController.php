<?php
require_once 'HotelModel.php';
require_once 'TourModel.php';

class SearchController {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function searchHotel($location) {
        $hotelModel = new HotelModel($this->dbConnection);
        $hotels = $hotelModel->searchHotels($location);
        require 'views/hotelSearchResults.php';
    }

    public function searchTour($location) {
        $tourModel = new TourModel($this->dbConnection);
        $tours = $tourModel->searchTours($location);
        require 'views/tourSearchResults.php';
    }
}
