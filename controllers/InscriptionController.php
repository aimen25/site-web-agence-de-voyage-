<?php

include_once 'models/UserModel.php';

class InscriptionController {
    private $model;

    // Constructeur pour initialiser le modèle
    public function __construct($model) {
        $this->model = $model;
    }

    // Méthode privée pour valider la force du mot de passe
    private function validatePassword($password) {
        // Utilisation d'une expression régulière pour une validation de mot de passe forte
        // Doit inclure des lettres majuscules, minuscules, des chiffres et des caractères spéciaux
        return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password);
    }

    // Méthode privée pour valider le format du nom
    private function validateName($name) {
        // Assure que le nom contient uniquement des lettres, espaces, apostrophes ou tirets
        return preg_match("/^([a-zA-Z\s'-]+\.)*[a-zA-Z\s'-]+$/", $name);
    }

    // Méthode privée pour valider le format de l'email
    private function validateEmail($email) {
        // Utilise filter_var pour une validation d'email robuste
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Méthode privée pour valider le format du numéro de téléphone
    private function validatePhone($phone) {
        // Vérifie que le téléphone est dans un format numérique approprié
        return preg_match("/^[0-9]{3,15}$/", $phone);
    }

    // Méthode publique pour inscrire un nouvel utilisateur
    public function inscrire($name, $password, $email, $phone) {
        // Validation complète des entrées utilisateur
        if (!$this->validateName($name) || !$this->validateEmail($email) || !$this->validatePhone($phone)) {
            return "Les données fournies ne sont pas valides.";
        }

        // Vérification de la force du mot de passe
        if (!$this->validatePassword($password)) {
            return "Le mot de passe n'est pas assez fort.";
        }

        // Vérification de l'unicité de l'email
        if ($this->model->checkEmailExists($email)) {
            // Message générique pour la sécurité
            return "Erreur lors de l'inscription. Veuillez réessayer.";
        }

        // Hachage du mot de passe pour la sécurité
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Enregistrement de l'utilisateur dans la base de données
        if ($this->model->registerUser($name, $hashedPassword, $email, $phone, "Subscriber")) {
            return "success";
        } else {
            return "Erreur lors de la création de l'utilisateur.";
        }
    }
}
?>
