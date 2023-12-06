<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $code;

    /**
     * Create a new message instance.
     * @param User $user 
     * @param string $code must contain 5 characters
     */
    public function __construct($user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vérifié votre adresse e-mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.verification-mail',
            with: [
                'user' => $this->user,
                'code' => $this->code,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
