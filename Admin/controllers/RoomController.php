<?php
include('RoomModel.php');
include('../connection.php');

class RoomController {
    private $model;

    public function __construct() {
        $this->model = new RoomModel($conn);
    }

    public function addRoom(...) {
        // Appel à la méthode du modèle pour ajouter une chambre
    }

    public function updateRoom(...) {
        // Appel à la méthode du modèle pour mettre à jour une chambre
    }

    public function deleteRoom($room_type_id) {
        // Appel à la méthode du modèle pour supprimer une chambre
    }

    // Autres méthodes si nécessaire
}
?>
