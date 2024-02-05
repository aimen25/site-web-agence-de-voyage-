<?php
class RoomModel {
    private $conn;

    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    public function getAllRooms() {
        // Code pour récupérer toutes les chambres
    }

    public function addRoom($hotel_id, $room_name, $room_desc, $price, $capacity, $available) {
        // Code pour ajouter une chambre
    }

    public function updateRoom($room_type_id, $hotel_id, $room_name, $room_desc, $price, $capacity, $available) {
        // Code pour mettre à jour une chambre
    }

    public function deleteRoom($room_type_id) {
        // Code pour supprimer une chambre
    }
}
?>
