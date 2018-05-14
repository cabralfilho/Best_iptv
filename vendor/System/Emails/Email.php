<?php

namespace System;


class Email
{
    
    /**
    * Application object
    *
    * @var \System\Application
    */
    
    private $app;
    
    /*
    * Constructor 
    *
    * @param App object
    */
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    
    /**
    * Call shared application object dynamically
    *
    * @param string $key
    * @return mixed
    */
    
    public function __get($key)
    {
        return $this->app->get($key);
    }

    public function sendE($addres, $subject, $body)
    {
         $mail = $this->phpMailer; // Passing `true` enables exceptions
        try{
                //Server settings
                $mail->SMTPDebug = 2;                                  // Set mailer to use SMTP
                $mail->Host = 'mail.best-iptv4k.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '4k@best-iptv4k.com';                 // SMTP username
                $mail->Password = 'Zeidkaled-1993';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;        
                //Recipients
                $mail->setFrom('4k@best-iptv4k.com');
                $mail->addAddress($addres);        // Name is optional

                //Attachments
//                $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
//                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }

    }

}
?>