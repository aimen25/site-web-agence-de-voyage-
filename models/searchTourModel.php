<?php
class TourModel {
    protected $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function searchTours($location) {
        $stmt = $this->db->prepare("SELECT * FROM tours WHERE location LIKE ? AND deletedAt IS NULL");
        $location = "%$location%";
        $stmt->bind_param("s", $location);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
