<div class="pixel-panel p-6 sm:p-8">
    @if ($sent)
        <flux:callout variant="success" icon="check-circle" heading="{{ __('portfolio.contact.sent_title') }}" text="{{ __('portfolio.contact.sent_body') }}" />
    @endif

    @if ($failed)
        <flux:callout variant="danger" icon="exclamation-triangle" heading="{{ __('portfolio.contact.error_title') }}" text="{{ __('portfolio.contact.error_body') }}" class="mb-4" />
    @endif

    @if ($rateLimited)
        <flux:callout variant="warning" icon="clock" text="{{ __('portfolio.contact.rate_limited') }}" class="mb-4" />
    @endif

    <form wire:submit="send" class="space-y-5">
        <flux:field>
            <flux:label>{{ __('portfolio.contact.name') }}</flux:label>
            <flux:input wire:model="name" placeholder="{{ __('portfolio.contact.name_placeholder') }}" />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>{{ __('portfolio.contact.email') }}</flux:label>
            <flux:input type="email" wire:model="email" placeholder="{{ __('portfolio.contact.email_placeholder') }}" />
            <flux:error name="email" />
        </flux:field>

        <flux:field>
            <flux:label>{{ __('portfolio.contact.message') }}</flux:label>
            <flux:textarea wire:model="message" rows="5" placeholder="{{ __('portfolio.contact.message_placeholder') }}" />
            <flux:error name="message" />
        </flux:field>

        {{-- Honeypot antyspamowy — ukryty przed ludzkim okiem, boty formularzowe często go wypełniają. --}}
        <div class="absolute -left-[9999px]" aria-hidden="true">
            <label for="website">{{ __('portfolio.contact.honeypot_label') }}</label>
            <input type="text" id="website" wire:model="website" tabindex="-1" autocomplete="off">
        </div>

        <flux:button type="submit" variant="primary" class="w-full sm:w-auto">
            <span wire:loading.remove wire:target="send">{{ __('portfolio.contact.send') }}</span>
            <span wire:loading wire:target="send">{{ __('portfolio.contact.sending') }}</span>
        </flux:button>
    </form>
</div>
