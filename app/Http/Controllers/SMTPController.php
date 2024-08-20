<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Http\Request;

class SMTPController extends Controller
{
    public static function sendMass($de,$para,$assunto,$mensagem,$anexos){
        //CONFIGURAÇÕES DE SERVIDOR
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
             )
         );
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.freventosdigitais.com.br';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->CharSet = 'UTF-8'; //charset
                                   
        $mail->Username   = 'comunicacao@freventosdigitais.com.br';                     //SMTP username
        $mail->SMTPKeepAlive = true; // Mantém a conexão SMTP viva para envios subsequentes
        $mail->Password   = 'SwPx3841';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587; 
        $mail->Timeout = 120; // 120 segundos
        //Corpo
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        //ANEXOS
        if(count($anexos) > 0){
            foreach($anexos as $a){
                $mail->addAttachment($a['RealPath'],$a['Nome']);
            }
        }
        //DESTINATÁRIO
        $mail->setFrom($de, $de); //Rementente
        foreach($para as $p){
            $mail->addAddress($p, $p);     //Destinatário
            $mail->send();
            $mail->clearAddresses();
        }        
        //
    }
}
