
<?php 

$name = $_POST['nombre'];
$email = $_POST['email'];
$number=$_POST['numero'];
$message = $_POST['mensaje'];



$email_body = "Haz recibido un nuevo mensaje. \n Nombre: $name \n Correo: $email \n Numero: $number \n Mensaje:  $message";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);                              
try {
   // $mail->SMTPDebug = 4;                               // Habilitar el debug

    $mail->isSMTP();                                      // Usar SMTP
    $mail->Host = 'smtp.gmail.com';  // Especificar el servidor SMTP reemplazando por el nombre del servidor donde esta alojada su cuenta
    $mail->SMTPAuth = true;                               // Habilitar autenticacion SMTP
    $mail->Username = 'moncacol@gmail.com';                 // Nombre de usuario SMTP donde debe ir la cuenta de correo a utilizar para el envio
    $mail->Password = 'sorprecita0613';                           // Clave SMTP donde debe ir la clave de la cuenta de correo a utilizar para el envio
    $mail->SMTPSecure = 'ssl';                            // Habilitar encriptacion
    $mail->Port = 465;                                    // Puerto SMTP                     
    $mail->Timeout       =   30;
    $mail->AuthType = 'LOGIN';

    //Recipients   

    $mail->setFrom('moncacol@gmail.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
    $mail->addAddress('moncacol@gmail.com');     // Agregar el destinatario
      

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Nuevo mensaje';
    $mail->Body    = $email_body;
    
    $mail->send();
    echo 'El mensaje ha sido enviado';

} catch (Exception $e) {
    echo 'El mensaje no pudo ser enviado. Mailer Error: ', $mail->ErrorInfo;
}

?>
