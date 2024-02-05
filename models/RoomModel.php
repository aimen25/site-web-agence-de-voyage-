<?php
// models/RoomModel.php

class RoomModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function checkRoomAvailability($hotelId, $roomTypeId, $requiredRoom) {
        $statement = $this->dbConnection->prepare(
            "SELECT capacity, available FROM room_type WHERE hotel_id=? AND room_type_id=? AND deletedAt IS NULL"
        );
        $statement->bind_param("ii", $hotelId, $roomTypeId);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        return ($requiredRoom > $result['available']) ? false : true;
    }
}
?>
