<?php

namespace Helpers;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
use PHPMailer\PHPMailer\SMTP as SMTP;
use PHPMailer\PHPMailer\Exception as Exception;
use Factory\ResetPasswordFactory\ResetPasswordFactory as ResetPasswordFactory;
use Database\ResetPasswordDb\ResetPasswordDb as ResetPasswordDb;

// Load Composer's autoloader
require('vendor/autoload.php');

class ResetPasswordHelper
{

    public static function emailResetLinkTo(string $email)
    {

        $isEmail = ResetPasswordHelper::emailTo($email);

        return $isEmail;
    }

    private static function emailTo(string $emailTo) 
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $token = uniqid(true);

        try {

            $rows = ResetPasswordHelper::addResetPasswordToDb($emailTo, $token);

            if ($rows) {
                //Server settings
                $mail->SMTPDebug = false;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = USER_EMAIL;                     // SMTP username
                $mail->Password   = USER_PW;                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom(USER_EMAIL, 'John Doe');     //Change John Doe to your business mail 
                $mail->addAddress("$emailTo", 'Jane Doe');     // Change Jane Doe to recipients name
                $mail->addReplyTo('no-reply@mail.com', 'Information');

                // Content
                $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/Views/ShowChangePassword?token=$token";
                
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Solicitud cambio de contraseña';
                $mail->Body    = "<h2>Solicitaste un cambio de contraseña para tu usuario</h2>
                                <h4>Para cambiar tu contraseña accede a este link: </h4> $url";
                
                return $mail->send();
            }
        } catch (Exception $e) {
            return false;
        }
    }

    private static function addResetPasswordToDb(string $email, string $token)
    {

        try {
            if(!ResetPasswordHelper::confirmTokenGeneration($email))
            {
                $resetPasswordFactory = new ResetPasswordFactory();
                $resetPassword = $resetPasswordFactory->create(0, $email, $token);
                $resetPasswordDb = new ResetPasswordDb();
                $rows = $resetPasswordDb->Add($resetPassword);
    
                return $rows;
            }else{
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    private static function confirmTokenGeneration(string $email) : bool
    {
        $resetPasswordDb = new ResetPasswordDb();
        $resetPassword = $resetPasswordDb->GetByEmail($email);

        if($resetPassword){
            return true;
        }

        return false;
    }

    public static function getValue()
    {
        return (isset($_GET["token"])) ? $_GET["token"] : false;
    }

    public static function encryptPassword(string $password): string
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }
}
