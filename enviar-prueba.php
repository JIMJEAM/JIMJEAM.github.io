<?php
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
);                                       //Preferiblemente al principio del try
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jaycomarket2021@gmail.com';                     //SMTP username
    $mail->Password   = 'papayatoday21';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('jaycomarket2021@gmail.com', 'jimmito');
    $mail->addAddress('jaycomarket2021@gmail.com');     //Add a recipient
   
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'hola estoy enviando un correo desde local host';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
    

    $mail->send();
    echo '<script>
    alert("El mensaje se envio correctamente");
    windows.history.go(-1;)
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}