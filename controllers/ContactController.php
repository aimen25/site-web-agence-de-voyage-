<?php
require_once 'ContactModel.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Utilisez FILTER_SANITIZE_EMAIL pour nettoyer l'adresse email
            $from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            // Utilisez htmlspecialchars pour éviter les attaques XSS
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            $subject = htmlspecialchars($_POST['subject']);
            $messageContent = htmlspecialchars($_POST['message']);
            // Concaténez le prénom et le nom pour créer le nom complet
            $name = $firstName . ' ' . $lastName;
            // Appel au modèle pour envoyer l'email
            $result = $this->contactModel->sendEmail($from, $name, $subject, $messageContent);
            // Stockez le résultat dans la session pour l'afficher dans le popup
            $_SESSION['contact_result'] = $result;
            // Redirigez vers la même page pour afficher le popup
            header('Location: contactForm.php');
            exit();
        }
    }
}
