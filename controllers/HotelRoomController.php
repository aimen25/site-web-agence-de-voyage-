<?php// controllers/HotelRoomController.php
include_once 'models/RoomModel.php';

class HotelRoomController {
    private $roomModel;

    public function __construct($roomModel) {
        $this->roomModel = $roomModel;
    }

    public function displayHotelRooms($hotelId) {
        $rooms = $this->roomModel->getHotelRooms($hotelId);
        include 'views/hotel-room.php'; // Chargement de la vue
    }
}
?>