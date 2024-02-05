<?php
// models/PostModel.php

class PostModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getPostDetails($postId) {
        $statement = $this->dbConnection->prepare(
            "SELECT * FROM posts WHERE post_id=? AND deletedAt IS NULL"
        );
        $statement->bind_param("i", $postId);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function deletePost($postId) {
        $statement = $this->dbConnection->prepare(
            "DELETE FROM posts WHERE post_id=?"
        );
        $statement->bind_param("i", $postId);
        return $statement->execute();
    }
}
?>