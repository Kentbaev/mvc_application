<?php

namespace App\Controllers;

use App\Core\Controller;

class MailController extends Controller
{
    public function index(){}

    public function send()
   {
       /*$to = trim(htmlspecialchars($_POST['to'])) ?? '';
       $to_name = trim(htmlspecialchars($_POST['to_name'])) ?? '';
       $subject = trim(htmlspecialchars($_POST['subject'])) ?? '';
       $sendername = trim(htmlspecialchars($_POST['name'])) ?? '';
       $text = trim(htmlspecialchars($_POST['text'])) ?? '';

       $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 2525, 'tls'))
           ->setUsername('kpfrom162@mail.ru')
           ->setPassword('777kentbaev');

       $mailer = new \Swift_Mailer($transport);
       $message = new \Swift_Message();
       $message->setSubject($subject);
       $message->setFrom(['kpfrom162@mail.ru' => $sendername]);
       $message->addTo($to, $to_name);
       $message->setBody($text);
       $message->addPart($text, 'text/html');
       $result = $mailer->send($message);*/

       $result = true;
       if($result)
       {
           $response = json_encode(["success" => true, "error" => false, 'data' => $result]);
           echo $response;
           die();
       }
       else
       {
           $response = json_encode(["success" => false, "error" => true, 'data' => null]);
           echo $response;
           die();
       }

   }
}
