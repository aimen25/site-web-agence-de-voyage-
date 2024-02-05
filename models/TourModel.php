<?php
// models/TourModel.php

class TourModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getTours($offset, $no_of_records_per_page) {
        $statement = $this->dbConnection->prepare(
            "SELECT * FROM tours WHERE deletedAt IS NULL ORDER BY tour_id ASC LIMIT ?, ?"
        );
        $statement->bind_param("ii", $offset, $no_of_records_per_page);
        $statement->execute();
        return $statement->get_result();
    }

    public function getTotalTours() {
        $result = $this->dbConnection->query("SELECT COUNT(*) FROM tours WHERE deletedAt IS NULL");
        return mysqli_fetch_array($result)[0];
    }

    // Nouvelle méthode pour vérifier la disponibilité des places
    public function checkSeatAvailability($tourId, $requiredSeat) {
        $statement = $this->dbConnection->prepare("SELECT capacity, available FROM tours WHERE tour_id=? AND deletedAt IS NULL");
        $statement->bind_param("i", $tourId);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        return ($requiredSeat > $result['available']) ? false : true;
    }

    public function searchToursByLocation($location, $offset, $noOfRecordsPerPage) {
        $location = "%$location%";
        $statement = $this->dbConnection->prepare(
            "SELECT * FROM tours WHERE location LIKE ? AND deletedAt IS NULL LIMIT ?, ?"
        );
        $statement->bind_param("sii", $location, $offset, $noOfRecordsPerPage);
        $statement->execute();
        return $statement->get_result();
    }
    
    public function countToursByLocation($location) {
        $location = "%$location%";
        $statement = $this->dbConnection->prepare(
            "SELECT COUNT(*) FROM tours WHERE location LIKE ? AND deletedAt IS NULL"
        );
        $statement->bind_param("s", $location);
        $statement->execute();
        $result = $statement->get_result()->fetch_array();
        return $result[0];
    }
}
?>
