<?php// controllers/RoomController.php

include_once 'models/RoomModel.php';

class RoomController {
    private $model;

    public function __construct() {
        $dbConnection = new mysqli("localhost", "username", "password", "dbname"); // Remplacez avec vos propres informations de connexion
        $this->model = new RoomModel($dbConnection);
    }

    public function checkAvailability($hotelId, $roomTypeId, $requiredRoom) {
        return $this->model->checkRoomAvailability($hotelId, $roomTypeId, $requiredRoom);
    }
}
?>