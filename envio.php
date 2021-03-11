<?php
$nombre=$_POST["nombre"];
$empresa=$_POST["empresa"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];
$mensaje=$_POST["mensaje"];
$asunto=$_POST["asunto"];

$body = "Buen día " .$nombre. "<br> Gracias por contactarse con nosotros. En breve nos pondremos en contacto contigo. "."<br> Saludos." ."<br> Empresa:" . $empresa ."<br> Teléfono:" .$telefono . "<br> Correo:" . $email. "<br>Mensaje:" .$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'proyectos@salazarconsultancy.page';                     // SMTP username
    $mail->Password   = 'Justdoit9!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('proyectos@salazarconsultancy.page', 'SALAZAR CONSULTANCY');
    $mail->addAddress('proyectos@salazarconsultancy.page');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC($email);
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    =  $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
    alert("El mensaje se envió correctamente");
    window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>