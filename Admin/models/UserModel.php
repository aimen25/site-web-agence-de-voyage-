<?php
// Chemin : models/UserModel.php

class UserModel {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    // Méthode existante pour supprimer un utilisateur
    public function deleteUserByEmail($email) {
        // Votre code existant pour supprimer un utilisateur...
    }

    // Nouvelle méthode pour récupérer tous les utilisateurs
    public function getAllUsers() {
        $users = [];
        $sql = "SELECT * FROM users";
        $result = $this->dbConnection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
}
