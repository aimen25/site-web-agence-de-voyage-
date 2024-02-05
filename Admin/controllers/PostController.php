<?php
// controllers/PostController.php

include_once '../models/PostModel.php';

class PostController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function addPost($cat_id, $title, $description, $image_name, $addedBy) {
        return $this->model->addPost($cat_id, $title, $description, $image_name, $addedBy);
    }
}

?>