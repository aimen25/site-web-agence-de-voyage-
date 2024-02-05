// ContactModel.php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ContactModel {
    public function sendEmail($from, $name, $subject, $body) {
        $mail = new PHPMailer(true);
        try {
          
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bentaalla.djillali@gmail.com';
            $mail->Password = 'rtce kryv jnvi pbjl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($from, $name);
            $mail->addAddress('receiver_email@gmail.com'); 
            $mail->isHTML(false);  
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            return "Votre message a été envoyé avec succès.";
        } catch (Exception $e) {
            return "L'envoi du message a échoué. Erreur : {$mail->ErrorInfo}";
        }
    }
}
