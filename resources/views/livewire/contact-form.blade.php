<div class="pixel-panel flex flex-col overflow-hidden p-0">
    {{-- Nagłówek okna — spójny z oknem chatu (About) i terminalem (Skills). --}}
    <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
        <div class="flex items-center gap-2">
            <flux:icon.envelope class="size-4 text-neon-cyan-400" />
            <span class="font-mono text-xs text-mist-300">{{ __('portfolio.contact.window_title') }}</span>
        </div>
        <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
    </div>

    <div class="p-5 sm:p-8">
        @if ($sent)
            <flux:callout variant="success" icon="check-circle" heading="{{ __('portfolio.contact.sent_title') }}" text="{{ __('portfolio.contact.sent_body') }}" class="mb-5" />
        @endif

        @if ($failed)
            <flux:callout variant="danger" icon="exclamation-triangle" heading="{{ __('portfolio.contact.error_title') }}" text="{{ __('portfolio.contact.error_body') }}" class="mb-5" />
        @endif

        @if ($rateLimited)
            <flux:callout variant="warning" icon="clock" text="{{ __('portfolio.contact.rate_limited') }}" class="mb-5" />
        @endif

        <form wire:submit="send" class="space-y-5">
            <div class="grid gap-5 sm:grid-cols-2">
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
            </div>

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

            <flux:button
                type="submit"
                variant="primary"
                class="w-full font-mono !border !border-neon-purple-500/40 !bg-ink-950/60 !text-mist-100 transition hover:!border-neon-cyan-400/60 hover:!bg-ink-800/60 sm:w-auto sm:min-w-56"
            >
                <span wire:loading.remove wire:target="send" class="inline-flex items-center gap-2">
                    <flux:icon.paper-airplane class="size-4 text-neon-cyan-400" />
                    {{ __('portfolio.contact.send') }}
                </span>
                <span wire:loading wire:target="send" class="inline-flex items-center gap-2">
                    <flux:icon.arrow-path class="size-4 animate-spin text-neon-cyan-400" />
                    {{ __('portfolio.contact.sending') }}
                </span>
            </flux:button>
        </form>
    </div>
</div>
