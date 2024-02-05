<?php
// controllers/UserController.php

include_once 'models/UserModel.php';

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($email, $password) {
        // Utilisez UserModel pour vérifier l'utilisateur
        // Retourne les données de l'utilisateur ou un message d'erreur
    }

    public function register($nom, $prenom, $email, $password) {
        // Utilisez UserModel pour créer un nouvel utilisateur
        // Retourne un succès ou un message d'erreur
    }
}
    ?>