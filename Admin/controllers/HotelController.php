<?php 
class HotelController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function createHotel($title, $location, $description, $owner, $image) {
        return $this->model->addHotel($title, $location, $description, $owner, $image);
    }

    public function removeHotel($hotelId) {
        return $this->model->deleteHotel($hotelId);
    }

    public function editHotel($hotelId, $title, $location, $description, $owner, $image) {
        return $this->model->updateHotel($hotelId, $title, $location, $description, $owner, $image);
    }
}
?>