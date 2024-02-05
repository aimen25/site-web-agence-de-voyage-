<?php
// models/SubscriberModel.php

class SubscriberModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function addSubscriber($email) {
        // Code pour ajouter l'email à la base de données
    }
}
?>
