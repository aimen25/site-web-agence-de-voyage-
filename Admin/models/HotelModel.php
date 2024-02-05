
<?php
class HotelModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getAllHotels() {
        // ... Votre code existant ...
    }

    public function addHotel($title, $location, $description, $owner, $image) {
        $stmt = $this->dbConnection->prepare("INSERT INTO hotels (title, location, hotel_desc, owner, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $location, $description, $owner, $image);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteHotel($hotelId) {
        $stmt = $this->dbConnection->prepare("DELETE FROM hotels WHERE hotel_id = ?");
        $stmt->bind_param("i", $hotelId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function updateHotel($hotelId, $title, $location, $description, $owner, $image) {
        $stmt = $this->dbConnection->prepare("UPDATE hotels SET title = ?, location = ?, hotel_desc = ?, owner = ?, image = ? WHERE hotel_id = ?");
        $stmt->bind_param("sssssi", $title, $location, $description, $owner, $image, $hotelId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>