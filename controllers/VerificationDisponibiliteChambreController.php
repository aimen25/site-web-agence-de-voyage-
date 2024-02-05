<?php
// controllers/VerificationDisponibiliteChambreController.php

include_once 'models/RoomModel.php';

class VerificationDisponibiliteChambreController {
    private $roomModel;

    public function __construct($roomModel) {
        $this->roomModel = $roomModel;
    }

    public function verifierDisponibiliteChambre($hotelId, $roomTypeId, $requiredRoom) {
        return $this->RoomModel->checkRoomAvailability($hotelId, $roomTypeId, $requiredRoom);
    }
}
