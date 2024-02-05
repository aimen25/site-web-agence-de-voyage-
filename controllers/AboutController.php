<?php
// controllers/AboutController.php

include_once 'models/AboutModel.php';

class AboutController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function loadTeamMembers() {
        return $this->model->getTeamMembers();
    }
}
?>
