<?php
// models/PostModel.php

class PostModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function addPost($cat_id, $title, $description, $image_name, $addedBy) {
        $sql = "INSERT INTO posts (cat_id, title, description, image, addedOn, addedBy)
                VALUES (?, ?, ?, ?, NOW(), ?)";

        $stmt = $this->dbConnection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("issss", $cat_id, $title, $description, $image_name, $addedBy);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}

?>