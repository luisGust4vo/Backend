<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnviarEmailNotification extends Notification
{
    use Queueable;


    public function __construct()
    {

    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Olá!')
            ->line('Este é um e-mail de Teste.')
            ->line('Obrigado por se cadastrar!');
    }


    public function toArray(object $notifiable): array
    {
        return [

        ];
    }
}
