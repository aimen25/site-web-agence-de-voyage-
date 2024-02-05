<?php
// models/HotelModel.php

class HotelModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function searchHotelsByLocation($location, $offset, $noOfRecordsPerPage) {
        $location = "%$location%";
        $statement = $this->dbConnection->prepare(
            "SELECT * FROM hotels WHERE location LIKE ? AND deletedAt IS NULL LIMIT ?, ?"
        );
        $statement->bind_param("sii", $location, $offset, $noOfRecordsPerPage);
        $statement->execute();
        return $statement->get_result();
    }

    public function countHotelsByLocation($location) {
        $location = "%$location%";
        $statement = $this->dbConnection->prepare(
            "SELECT COUNT(*) FROM hotels WHERE location LIKE ? AND deletedAt IS NULL"
        );
        $statement->bind_param("s", $location);
        $statement->execute();
        $result = $statement->get_result()->fetch_array();
        return $result[0];
    }


public function searchHotelsByPrice($minPrice, $maxPrice, $offset, $noOfRecordsPerPage) {
    $statement = $this->dbConnection->prepare(
        "SELECT * FROM hotels WHERE price BETWEEN ? AND ? AND deletedAt IS NULL LIMIT ?, ?"
    );
    $statement->bind_param("iiii", $minPrice, $maxPrice, $offset, $noOfRecordsPerPage);
    $statement->execute();
    return $statement->get_result();
}

public function countHotelsByPrice($minPrice, $maxPrice) {
    $statement = $this->dbConnection->prepare(
        "SELECT COUNT(*) FROM hotels WHERE price BETWEEN ? AND ? AND deletedAt IS NULL"
    );
    $statement->bind_param("ii", $minPrice, $maxPrice);
    $statement->execute();
    $result = $statement->get_result()->fetch_array();
    return $result[0];
}
}
?>
