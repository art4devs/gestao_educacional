<?php

namespace Educacional\Listeners;

use Educacional\Events\UserCreatedEvent;
use Educacional\Notifications\UserCreatedNotification;

class SendWelcomeMailListener
{
    /**
     * Listener para envio de email de boas vindas ao usuario.
     *
     * @param UserCreatedEvent $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $user = $event->getUser();
        $data = $event->getData();

        if (isset($data['send_mail'])) {
            $tokenResetPass = \Password::broker()->createToken($user);
            $user->notify(new UserCreatedNotification($tokenResetPass));
        }
    }
}
