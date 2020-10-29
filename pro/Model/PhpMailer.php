<?php

namespace Phppot;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';




class Php_Mailer
{

	private $usersTable = 'tbl_member';

    public $avatar;

    function __construct()
    {
    

        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }












    

public function emailVerify()
{



    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



     $password = generateRandomString();

     
          








            

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'AdresMailowyKlienta';                     // SMTP username
                $mail->Password   = 'HasłoKlienta';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            } 
              




           catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: ";
            }



              //Recipients
              $mail->setFrom($_POST['email'], 'Mailer');
              $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient


          

              // Content
              $mail->isHTML(true);              
              
            
              $mail->Subject = "Informacje o nowym hasle";
              $mail->Body    = "Nowe hasło to: ". $password ;
            //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
             
              $mail->send();
              echo 'Message has been sent';
              
              if($_POST['email']) {	
                $sqlUpdate = "UPDATE ".$this->usersTable." SET password = '".password_hash($password, PASSWORD_DEFAULT)."' WHERE email = '".$_POST["email"]."'";
                    mysqli_query($this->ds->getConnection(), $sqlUpdate);
                echo 'User Update';
            }	

                    




            }




}


?>