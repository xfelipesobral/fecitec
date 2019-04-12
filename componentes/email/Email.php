<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    class Email{
        private $mail;

        public function __construct(){
            $this->mail = New PHPMailer(true);
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp3.ufpr.br';  
            $this->mail->SMTPAuth = true;                  
            $this->mail->Username = '#';  
            $this->mail->Password = '#';             
            $this->mail->SMTPSecure = 'STATTLS';              
            $this->mail->Port = 587;  
        }

        public function enviar($titulo, $mensagem, $destinatario){

            try {
                $this->mail->setFrom('fecitec@ufpr.br', 'FECITEC');
                $this->mail->addAddress('fecitec.ufpr@gmail.com');
                $this->mail->addAddress($destinatario);
                $this->mail->addAddress('xfelipesobral@gmail.com');

                $this->mail->isHTML(true); 
                $this->mail->Subject = utf8_decode($titulo);
                $this->mail->Body = utf8_decode($mensagem);
                $this->mail->AltBody = utf8_decode($mensagem);

                $this->mail->send();
                
                echo "#true#";
            } catch (Exception $e){
                //echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                echo "#false#";

            }
            
        }

    }