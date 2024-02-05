<?php 
class HotelBookingModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function createBooking($hotelId, $roomTypeId, $userInfo) {
        $stmt = $this->dbConnection->prepare("INSERT INTO bookings (hotel_id, room_type_id, user_name, user_email, ...) VALUES (?, ?, ?, ?, ...)");
        $stmt->bind_param("iiss...", $hotelId, $roomTypeId, $userInfo['name'], $userInfo['email'] /* autres champs */);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // Autres méthodes utiles pour la logique métier
}
?>