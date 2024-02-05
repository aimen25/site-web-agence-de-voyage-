<?php
// controllers/SubscribeController.php

include_once 'models/SubscriberModel.php';

class SubscribeController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function subscribe($email) {
        // Valider l'email et appeler le modèle pour l'ajouter
    }
}
?>
