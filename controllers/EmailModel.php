<?php
require_once 'EmailModel.php';

class ContactController {
    private $emailModel;

    public function __construct() {
        $this->emailModel = new EmailModel();
    }

    public function processContactForm($formData) {
        // Validation des données ici (à implémenter)
        $response = $this->emailModel->sendEmail(
            $formData['email'], 
            $formData['subject'], 
            $formData['message']
        );
        return $response;
    }
}
?>