<?php

    header("Access-Control-Allow-Origin : *");
    header("Content-Type: application/json;charset=UTF-8");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-headers: *");
    header("Access-Control-Max-Age : 5");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'mailer/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'saididougrram2@gmail.com';                     //SMTP username
    $mail->Password   = 'asjlznrfhxijyeiy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;   



    if (isset($_POST["email"]) && isset($_POST["text"])) {
        if ($_POST["email"] != NULL && $_POST["text"] != NULL) {
            filter_var($_POST["email"] , FELTER_SANITIZE_EMAIL);
            filter_var($_POST["text"] , FELTER_SANITIZE_STRING);
            $mail->setFrom($_POST["email"], 'coloursea.com');
            $mail->addAddress("saididougrram2@gmail.com", 'text');
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'order';
            $mail->Body    = '<h1 style="font-size: 30px;color: red;width: 100%"> email : ' . $_POST["email"] . '</h1>' . '<p style="width: 100%;">' . $_POST["text"] . "</p>";
            $mail->send();

        }
    }

?>