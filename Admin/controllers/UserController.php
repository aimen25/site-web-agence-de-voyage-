<?php
// Chemin : controllers/UserController.php

include_once '../models/UserModel.php';

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Méthode existante pour supprimer un utilisateur
    public function deleteUser($email) {
        return $this->model->deleteUserByEmail($email);
    }

    // Nouvelle méthode pour obtenir tous les utilisateurs
    public function getAllUsers() {
        return $this->model->getAllUsers();
    }
}
