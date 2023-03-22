<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

try {
        // Instanz der PHPMailer-Klasse erstellen
        $mail = new PHPMailer($debug);

        if ($debug) {
                // gibt einen ausführlichen log aus
                $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; }
        }

        // Authentifikation mittels SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        // Login
        $mail->Host = "smtp.domain.de";
        $mail->Port = "587";
        $mail->Username = "name.nachname@domain.de";
        $mail->Password = "probepasswort4321";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $mail->addAttachment("/home/user/Desktop/beispielbild.png", "beispielbild.png");

     $mail->CharSet = 'UTF-8';
     $mail->Encoding = 'base64';

        $mail->isHTML(true);
        $mail->Subject = 'Der Betreff Ihrer Mail';
     $mail->Body = 'Der Text Ihrer Mail als HTML-Inhalt. Auch <b>fettgedruckte</b> Elemente sind beispielsweise erlaubt.';
     $mail->AltBody = 'Der Text als simples Textelement';

        $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}