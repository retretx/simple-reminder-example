<?php


namespace App\Service;

use App\RemindUserInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Reminder
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(RemindUserInterface $user, string $message): void
    {
        $mail = new Email();
        $mail->to(addresses: $user->getEmail());
        $mail->html(body: $message);

        $this->mailer->send(message: $mail);
    }
}