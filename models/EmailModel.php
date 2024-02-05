<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailModel {
    public function sendEmail($from, $subject, $message, $to = "bentaalla.djillali@gmail.com") {
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

            $mail->setFrom($from);
            $mail->addAddress($to);

            $mail->isHTML(true); // Si votre message est au format HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            return "Message envoyé avec succès.";
        } catch (Exception $e) {
            return "Erreur lors de l'envoi de l'e-mail: " . $mail->ErrorInfo;
        }
    }
}

?>