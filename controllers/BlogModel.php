<?php
// models/BlogModel.php

class BlogModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getPosts($offset, $noOfRecordsPerPage) {
        $query = "SELECT * FROM posts WHERE deletedAt IS NULL LIMIT ?, ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("ii", $offset, $noOfRecordsPerPage);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getTotalPostsCount() {
        $query = "SELECT COUNT(*) FROM posts WHERE deletedAt IS NULL";
        $result = $this->dbConnection->query($query);
        $row = $result->fetch_row();
        return $row[0];
    }
}
?>
