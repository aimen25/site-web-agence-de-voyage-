<?php
// models/AboutModel.php

class AboutModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getTeamMembers() {
        // Exemple de requête pour obtenir des informations sur l'équipe
        $sql = "SELECT name, role, image FROM team_members";
        $result = $this->dbConnection->query($sql);

        $teamMembers = [];
        while ($row = $result->fetch_assoc()) {
            $teamMembers[] = $row;
        }
        return $teamMembers;
    }
}
?>
