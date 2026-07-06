<?php

namespace App\Livewire;

use App\Mail\NewContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

/**
 * Jedyny dynamiczny element strony (zgodnie z architekturą — bez bazy danych).
 * Waliduje dane po stronie serwera, chroni honeypotem i rate limiterem
 * (na cache, nie na bazie danych), po czym wysyła maila przez Resend/SMTP.
 * E-mail jest jedynym źródłem prawdy o wiadomości — nic nie jest zapisywane.
 */
class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $message = '';

    /**
     * Pole honeypot — niewidoczne dla ludzi (ukryte w CSS), boty formularzowe
     * zwykle je wypełniają. Jeśli ma jakąkolwiek wartość, cicho udajemy
     * sukces i nic nie wysyłamy.
     */
    public string $website = '';

    public bool $sent = false;

    public bool $failed = false;

    public bool $rateLimited = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => __('portfolio.contact.errors.name_required'),
            'name.min' => __('portfolio.contact.errors.name_required'),
            'name.max' => __('portfolio.contact.errors.name_max'),
            'email.required' => __('portfolio.contact.errors.email_required'),
            'email.email' => __('portfolio.contact.errors.email_invalid'),
            'message.required' => __('portfolio.contact.errors.message_required'),
            'message.min' => __('portfolio.contact.errors.message_min'),
            'message.max' => __('portfolio.contact.errors.message_max'),
        ];
    }

    public function send(): void
    {
        $this->sent = false;
        $this->failed = false;
        $this->rateLimited = false;

        $this->validate();

        // Honeypot niepusty -> prawdopodobnie bot. Udajemy sukces, nic nie wysyłamy.
        if (filled($this->website)) {
            $this->resetForm();
            $this->sent = true;

            return;
        }

        $throttleKey = 'contact-form:'.request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, maxAttempts: 3)) {
            $this->rateLimited = true;

            return;
        }

        RateLimiter::hit($throttleKey, decaySeconds: 600);

        try {
            Mail::to(config('mail.contact_recipient'))->send(
                new NewContactMessage(
                    senderName: $this->name,
                    senderEmail: $this->email,
                    body: $this->message,
                )
            );

            $this->resetForm();
            $this->sent = true;
        } catch (\Throwable $e) {
            report($e);
            $this->failed = true;
        }
    }

    private function resetForm(): void
    {
        $this->reset(['name', 'email', 'message', 'website']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
