<?php
class HotelModel {
    protected $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function searchHotels($location) {
        $stmt = $this->db->prepare("SELECT * FROM hotels WHERE location LIKE ? AND deletedAt IS NULL");
        $location = "%$location%";
        $stmt->bind_param("s", $location);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
