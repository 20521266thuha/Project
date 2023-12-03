<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

include 'db_conn.php';
$msg = ""; 

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='{$code}' WHERE email='{$email}'");

            if ($query) {        
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = '20521266@gm.uit.edu.vn';                     // SMTP username
                    $mail->Password   = 'suga09393';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
                    $mail->Port       = 465;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    // Recipients
                    $mail->setFrom('20521266@gm.uit.edu.vn', "Mia BookCorner");
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Do not reply';
                    $mail->Body    = 'Here is the verification link <b><a href="http://localhost/Web_Project/Book_web/Login/change_pass.php?reset='.$code.'">http://localhost/Web_Project/Book_web/Login/change_pass.php?reset='.$code.'</a></b>';

                    $mail->send();
                    
                    // $msg = "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
                    $msg = "<div class='alert alert-info' style='background-color: #9bc0b4; color: #044530; padding: 10px; margin-top: 20px;'>
                                 We've sent a verification link to your email address.
                            </div>";


                } catch (Exception $e) {
                    $msg = "<div class='alert alert-info' style='background-color: #f2dede; color: #b84444; padding: 10px; margin-top: 20px;'>
                                 Message could not be sent. Mailer Error: {$mail->ErrorInfo}
                            </div>";
                }
            }
        } else {
            $msg = "<div class='alert alert-info' style='background-color: #f2dede; color: #b84444; padding: 10px; margin-top: 20px;'>
                                 Email not found in the database.
                            </div>";
        }
    } else {
        $msg = "<div class='alert alert-info' style='background-color: #f2dede; color: #b84444; padding: 10px; margin-top: 20px;'>
                                 Invalid email address.
                            </div>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Forgot password - MIA BOOKCORNER</title>
    <link rel="stylesheet" type="text/css" href="./Style/index.css">
</head>
<style>
    .body {
        align-items: center;
    }

    .button {
        min-width: 290px;
        max-width: 350px;
        width: 74%;
        margin-left: 52px;
        border-radius: 2px;
    }

    .container-content-right {
        align-items: center;
    }

</style>
<body>
    <form method="post">
        <div id="login-container" style="width: 100%; height: 100%">
            <div class="container-content">
                <div class="container-content-left">
                    <img src="./Assets/LoginBox.png" />
                </div>
                <div class="container-content-right">
                    <p class="title" style="color: #046543; font-size: 20px;margin-top: 20px;"><b>FORGOT PASSWORD?</b></p>
                    <p class="title" style="color: #9ba9a4; font-size: 14px;">Enter your email to receive a reset link</p>

                    <?php echo $msg; ?>

                    <input type="email" name="email" placeholder="Enter your email" style="width: 285px; height: 35px; margin-top: 30px;" />

                    <button type="submit" class="button" style="color: #F6C017; padding: 9px; text-decoration: none; margin-top: 17px;"><b>SEND RESET LINK</b></button>
                    <p class="title" style="color: #9ba9a4; margin-top: 20px; font-style: italic; font-size: 14px">Back to <a href="index.php">Login</a> </p>
                    <p class="title" style="color: #9ba9a4; font-size: 8px; margin-top:10px;"><i>Copyright © MiaBookcorner.com</i></p>

                </div>
            </div>
        </div>

    </form>
</body>
</html>
