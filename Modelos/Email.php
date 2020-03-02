<?php 
namespace Modelos;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
include '../APIs/PHPMailer/vendor/autoload.php';

class Email
{
    private $vkey,$email;

    public function setEmail($email)
    {
        $this->email = $email;
        $this->vkey = hash('sha256', time() . $email);
        return $this->vkey;
    }


    public function enviarEmailConfirmacion()
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'ceo@escuelaalreves.com';               // SMTP username
            $mail->Password   = 'kdLTxFC+';                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('ceo@escuelaalreves.com', 'Equipo de soporte CAFI');
            $mail->addAddress($this->email);     // Add a recipient
            $mail->addReplyTo('ceo@escuelaalreves.com', 'Equipo de soporte CAFI');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Verificacion de correo CAFI';
            $mail->Body    = "<a href='https://www.escuelaalreves.com/controllers/confirm.php?vkey=$this->vkey'>verificar cuenta</a>";
            $mail->AltBody = "<a href='https://www.escuelaalreves.com/controllers/confirm.php?vkey=$this->vkey'>verificar cuenta</a>";

            $mail->send();

            //echo 'Message has been sent';

        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function enviarEmailRecuperarPass()
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'ceo@escuelaalreves.com';               // SMTP username
            $mail->Password   = 'kdLTxFC+';                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('ceo@escuelaalreves.com', 'Equipo de soporte Uniline');
            $mail->addAddress($this->email);     // Add a recipient
            $mail->addReplyTo('ceo@escuelaalreves.com', 'Equipo de soporte Uniline');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recuperar contraseña Uniline';
            $mail->Body    = "<a href='https://www.escuelaalreves.com/controllers/resetPass.php?vkey=$this->vkey'>Recuperar contrasena</a>";
            $mail->AltBody = "<a href='https://www.escuelaalreves.com/controllers/resetPass.php?vkey=$this->vkey'>Recuperar contrasena</a>";

            $mail->send();

            //echo 'Message has been sent';

        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
    public function generarNewPass(){
        //Carácteres para la contraseña
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@#$%$?!<>_-";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i < 8;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str,rand(0,62),1);
        }
        //Mostramos la contraseña generada
        return $password;
    }

}