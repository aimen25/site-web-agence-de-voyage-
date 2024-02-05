<?php
// models/TourDetailsModel.php

class TourDetailsModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getTourDetails($tourId) {
        $statement = $this->dbConnection->prepare("SELECT * FROM tours WHERE tour_id = ?");
        $statement->bind_param("i", $tourId);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
}
?>
