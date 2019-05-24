<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:/Users/User/PhpstormProjects/ABC_LMS/PHPMailer-6.0.7/src/Exception.php';
    require 'C:/Users/User/PhpstormProjects/ABC_LMS/PHPMailer-6.0.7/src/PHPMailer.php';
    require 'C:/Users/User/PhpstormProjects/ABC_LMS/PHPMailer-6.0.7/src/SMTP.php';

    $mail = new PHPMailer(true);

    try{
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vihangasathsra97@gmail.com';
        $mail->Password = '@zorro__97';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('vihangasathsara97@gmail.com','ABC Institute');
        $mail->addAddress("vihanga.wimalasena@aiesec.net");

        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body = 'Here is the HTML message body';
        $mail->AltBody = 'This is the body in plain text';

        $mail->send();
        echo 'Message has been sent';
    }catch (\Exception $e){
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }