<?php
require 'ContactController.php';

$controller = new ContactController();
$notifyMsg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formData = [
        'email' => data_sanitization($_POST['email']),
        'subject' => data_sanitization($_POST['subject']),
        'message' => data_sanitization($_POST['message'])
        // Ajoutez d'autres champs si nécessaire
    ];

    $notifyMsg = $controller->processContactForm($formData);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    
</head>
<body>
    <h1>Contactez-nous</h1>

    <?php if (!empty($notifyMsg)) : ?>
        <div class="notification">
            <?= $notifyMsg ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de contact -->
    <form method="post" action="contact.php">
   
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Sujet:</label>
        <input type="text" name="subject" required>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>
</html>
