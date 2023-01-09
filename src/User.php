<?php

namespace App\src;

class User
{
    public $firstName;
    public $lastName;
    public $email;
    protected $mailer;
    protected $mailerCallable;

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setMailerCallable(callable $mailerCallable)
    {
        $this->mailerCallable = $mailerCallable;
    }

    public function getFullName()
    {
        return trim("$this->firstName $this->lastName");
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function sendEmail($message)
    {
        return Mailer::send($this->email, $message);
    }
}