<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Wiadomość wysyłana z formularza kontaktowego na stronie.
 *
 * Świadomie NIE implementuje ShouldQueue — projekt nie ma bazy danych
 * (ani innego trwałego backendu kolejki), więc wysyłka odbywa się
 * synchronicznie w tym samym żądaniu HTTP. E-mail jest jedynym
 * źródłem prawdy o wiadomości.
 */
class NewContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $senderName,
        public readonly string $senderEmail,
        public readonly string $body,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Nowa wiadomość z portfolio od {$this->senderName}",
            replyTo: [$this->senderEmail],
        );
    }

    public function content(): Content
    {
        // Szablon używa komponentów <x-mail::...>, więc musi być renderowany
        // jako markdown — zwykłe `view:` nie rejestruje ścieżki `mail::`.
        return new Content(
            markdown: 'emails.new-contact-message',
        );
    }
}
