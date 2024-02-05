<?php

class UserModel {
    // Propriété pour stocker la connexion à la base de données
    protected $dbConnection;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    // Méthode pour vérifier si un email existe déjà dans la base de données
    public function isEmailExist($email) {
        // Préparation de la requête pour éviter les injections SQL
        $statement = $this->dbConnection->prepare("SELECT * FROM users WHERE email = ?");
        // Liaison du paramètre email à la requête pour une exécution sécurisée
        $statement->bind_param("s", $email);
        // Exécution de la requête
        $statement->execute();
        // Récupération du résultat
        $result = $statement->get_result();
        // Retourne true si l'email existe déjà, false sinon
        return ($result->num_rows > 0);
    }

    // Méthode pour enregistrer un nouvel utilisateur dans la base de données
    public function registerUser($name, $hashedPassword, $email, $phone, $role) {
        // Préparation de la requête d'insertion pour la sécurité
        $stmt_insert = $this->dbConnection->prepare("INSERT INTO users (name, password, email, phone, user_role) VALUES (?, ?, ?, ?, ?)");
        // Liaison des paramètres à la requête pour éviter les injections SQL
        $stmt_insert->bind_param("sssss", $name, $hashedPassword, $email, $phone, $role);
        // Exécution de la requête et retourne le résultat
        return $stmt_insert->execute();
    }
}
?>
