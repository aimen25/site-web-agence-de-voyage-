<?php

// Paramètres de connexion à la base de données
define('DB_SERVER', 'localhost'); // Adresse du serveur de base de données
define('DB_USERNAME', 'root'); // Nom d'utilisateur pour se connecter à la base de données
define('DB_PASSWORD', ''); // Mot de passe pour se connecter à la base de données
define('DB_NAME', 'travel_db'); // Nom de la base de données

// Tentative de connexion à la base de données MySQL
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
