<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require '../vendor/autoload.php';
require '../config.php';

$email = $_POST['correo'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $MAIL_HOST;                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $MAIL_USER;                     // SMTP username
    $mail->Password   = $MAIL_PASS;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $MAIL_PORT;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($MAIL_USER, 'Sistema administrativo');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Credenciales Sistema PUAM';
    $mail->Body    = 'Bienvenido al Sistema PUAM \n Para ingresar utiliza tu correo institucional y la siguiente  contraseña: ' . $MAIL_PASS_DEFAULT . 'en ' . $DOMINIO;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->SMTPDebug = false;
    $mail->do_debug = false;

    $mail->send();
    echo 'enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
