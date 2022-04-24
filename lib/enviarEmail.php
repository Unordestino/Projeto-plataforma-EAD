<?php

use PHPMailer\PHPMailer\PHPMailer;

function enviarEmail($destinatario, $assunto, $mensagemHTML)
{

    require 'vendor/autoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'mail.davisilveira.com.br';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'seu-email';
    $mail->Password = 'sua-senha';

    $mail->SMTPSecure = false;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('suporte@davisilveira.com.br', "Suporte EAD");
    $mail->addAddress($destinatario);
    $mail->Subject = $assunto;

    $mail->Body = $mensagemHTML;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

}
?>