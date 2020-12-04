<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/autoload.php';
    function verification($register_email, $token){
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username = 'notolistore@gmail.com';
        $mail->Password = 'gauden123';                               // SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;      
    
        //Recipients
        $mail->setFrom('notolistore@gmail.com', 'Notoli Sneakers');
        $mail->addAddress($register_email);                   // Name is optional
        $mail->addReplyTo('notolistore@gmail.com', 'Notoli Sneakers');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Verify Account NOTOLI';
        $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Document</title>
          </head>
          <body>
            <div class="wrapper">
              <p>
                Cảm ơn bạn đã thực hiện đăng kí tài khoản tại website
                NOTOLI.COM. Vui lòng truy cập vào link bên dưới để xác
                nhận tài khoản!
              </p>
              <a href="http://localhost/notoli/Register/verify/' . $token . '">Xác nhận tài khoản</a>
            </div>
          </body>
        </html>';
        $result = false;
        if($mail->send()) {
            $result = true;
        }
        return json_encode($result);
    }
?>