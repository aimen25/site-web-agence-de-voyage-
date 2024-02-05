<?php
// models/SidebarModel.php

class SidebarModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getTourLocations() {
        $statement = $this->dbConnection->prepare("SELECT location FROM tours WHERE deletedAt IS NULL ORDER BY tour_id ASC LIMIT 5");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Autres méthodes selon les besoins...
}
?>
