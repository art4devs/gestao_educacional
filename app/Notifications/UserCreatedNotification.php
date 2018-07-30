<?php

namespace Educacional\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreatedNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject("Seja bem vindo a EdUcA!")
                ->greeting("Sua conta no EdUcA acaba de ser criada.")
                ->line("Seu número de matricula é {$notifiable->enrolment}")
                ->action('Criar uma senha', url('/'))
                ->line("Obrigado por estar conosco em mais este novo ciclo!")
                ->salutation("Atenciosamente, EdUcA.");
    }
}
