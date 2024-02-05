<?php
// controllers/BlogController.php

require 'models/BlogModel.php';

class BlogController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getBlogPageData($currentPage) {
        $noOfRecordsPerPage = 2;
        $offset = ($currentPage - 1) * $noOfRecordsPerPage;
        $totalRows = $this->model->getTotalPostsCount();
        $totalPages = ceil($totalRows / $noOfRecordsPerPage);

        $posts = $this->model->getPosts($offset, $noOfRecordsPerPage);

        return [
            'posts' => $posts,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ];
    }
}
?>
