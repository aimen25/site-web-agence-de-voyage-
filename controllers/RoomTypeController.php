<?php
include('RoomModel.php');
include('../connection.php');

class RoomController {
    private $model;

    public function __construct() {
        $this->model = new RoomModel($conn);
    }

    public function getRooms() {
        return $this->model->getAllRooms();
    }
}
?>
