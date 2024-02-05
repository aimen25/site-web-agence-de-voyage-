<?php
// controllers/VueArticleController.php

include_once 'models/PostModel.php';

class VueArticleController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function afficherArticle($postId) {
        return $this->model->getPostDetails($postId);
    }
}
?>
