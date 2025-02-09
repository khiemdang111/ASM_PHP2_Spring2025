<?php
namespace App\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer
{

  public function sendEmail($title, $content, $addressMail)
  {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
      $mail->isSMTP();
      $mail->CharSet = 'utf-8';                                         //Send using SMTP
      $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $mail->Username = 'khiemdqpc08794@gmail.com';                     //SMTP username
      $mail->Password = 'zaudhzdglbdyiqle';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('khiemdqpc08794@gmail.com', 'K-Food');
      $mail->addAddress($addressMail);     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $title;
      $mail->Body = $content;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->send();
      $_SESSION['mailSendSuccess'] = "Gửi email thành công, vui lòng đợi trong giây lát!";
    } catch (Exception $e) {
      $_SESSION['mailSendError'] = "Đã có lỗi xảy ra vui. Vui lòng liên hệ với quản trị viên để biết thêm chi tiết";
    }
  }
}