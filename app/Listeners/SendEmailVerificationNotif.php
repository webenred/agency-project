<?php

namespace App\Listeners;

use App\Events\RegistrationEvent;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendEmailVerificationNotif 
{
    /**
     * Handle the event.
     */
    public function handle(RegistrationEvent $event): void
    {
        if ($event->user instanceof MustVerifyEmail && !$event->user->hasVerifiedEmail()) {
            Notification::send($event->user, new VerifyEmailNotification);
        }
    }
}
