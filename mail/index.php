<?php

require_once 'vendor/autoload.php';

use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['SMTP_HOST', 'SMTP_USERNAME', 'SMTP_PASSWORD'])->notEmpty();
$mail = new Message();
$mailer = new SmtpMailer([
    'host' => $_ENV['SMTP_HOST'],
    'username' => $_ENV['SMTP_USERNAME'],
    'password' => $_ENV['SMTP_PASSWORD'],
    'secure' => 'ssl',
]);

$mail->setFrom('Jenda <info@honzapilar.cz>')
     ->addTo('pilarjan4111@gmail.com')
     ->setSubject('Test')
     ->setHtmlBody('<h1>Hello there!</h1>');

$mailer->send($mail);
