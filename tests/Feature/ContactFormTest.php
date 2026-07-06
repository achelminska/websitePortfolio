<?php

use App\Livewire\ContactForm;
use App\Mail\NewContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Livewire;

beforeEach(function () {
    Mail::fake();
    RateLimiter::clear('contact-form:127.0.0.1');
});

test('valid submission sends the contact email and shows a success state', function () {
    Livewire::test(ContactForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->set('message', 'Cześć, chciałbym porozmawiać o współpracy.')
        ->call('send')
        ->assertHasNoErrors()
        ->assertSet('sent', true);

    Mail::assertSent(NewContactMessage::class, function (NewContactMessage $mail) {
        return $mail->senderEmail === 'jan@example.com'
            && $mail->hasTo(config('mail.contact_recipient'));
    });
});

test('missing or invalid fields are rejected without sending mail', function () {
    Livewire::test(ContactForm::class)
        ->set('name', '')
        ->set('email', 'not-an-email')
        ->set('message', 'short')
        ->call('send')
        ->assertHasErrors(['name', 'email', 'message']);

    Mail::assertNothingSent();
});

test('a filled honeypot silently pretends success without sending mail', function () {
    Livewire::test(ContactForm::class)
        ->set('name', 'Bot Account')
        ->set('email', 'bot@example.com')
        ->set('message', 'This is an automated spam message.')
        ->set('website', 'https://spam.example.com')
        ->call('send')
        ->assertHasNoErrors()
        ->assertSet('sent', true);

    Mail::assertNothingSent();
});

test('too many submissions from the same visitor are rate limited', function () {
    for ($i = 0; $i < 3; $i++) {
        Livewire::test(ContactForm::class)
            ->set('name', 'Jan Kowalski')
            ->set('email', 'jan@example.com')
            ->set('message', 'Wiadomość numer '.$i.' o wystarczającej długości.')
            ->call('send')
            ->assertSet('sent', true);
    }

    Livewire::test(ContactForm::class)
        ->set('name', 'Jan Kowalski')
        ->set('email', 'jan@example.com')
        ->set('message', 'Kolejna wiadomość, która powinna zostać zablokowana.')
        ->call('send')
        ->assertSet('rateLimited', true)
        ->assertSet('sent', false);

    Mail::assertSent(NewContactMessage::class, 3);
});
