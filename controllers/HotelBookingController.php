<?php
require 'HotelBookingModel.php';

class HotelBookingController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function bookRoom($hotelId, $roomTypeId, $userInfo) {
        // Utilisez $this->model pour créer une réservation
        $this->model->createBooking($hotelId, $roomTypeId, $userInfo);

        // Traitez le résultat et retournez-le à la vue (par exemple, succès ou échec)
    }
}
?>
