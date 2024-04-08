<?php

namespace App\Milay\Notify;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PushNotification
{
    protected $smtpHost;
    protected $smtpUsername;
    protected $smtpPassword;
    protected $smtpPort;
    protected $smtpEncryption;
    protected $senderEmail;
    protected $senderName;
    protected $subject;

    public function __construct()
    {
        $this->smtpHost = $_ENV['SMTP_HOST'];
        $this->smtpUsername = $_ENV['SMTP_USERNAME'];
        $this->smtpPassword = $_ENV['SMTP_PASSWORD'];
        $this->smtpPort = $_ENV['SMTP_PORT']; 
        $this->smtpEncryption = $_ENV['SMTP_ENCRYPTION'];
        
        $this->senderEmail = $_ENV['SENDER_EMAIL'];
        $this->senderName = $_ENV['SENDER_NAME'];
        $this->subject = $_ENV['EMAIL_SUBJECT'];
    }

    public function sendMail($userEmail, $message)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $this->smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $this->smtpUsername;
            $mail->Password = $this->smtpPassword;
            $mail->Port = $this->smtpPort;
            $mail->SMTPSecure = $this->smtpEncryption;

            // Destinataire
            $mail->setFrom($this->senderEmail, $this->senderName);
            $mail->addAddress($userEmail);

            // Contenu du message
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body = $message;

            // Envoyer l'e-mail
            $mail->send();
            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}
