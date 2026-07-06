<section id="about" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.about.kicker') }}</p>
    <h1 class="mt-2 font-pixel text-xl leading-relaxed text-mist-100 sm:text-2xl">
        {{ __('portfolio.about.title') }}
    </h1>

    <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,420px)_1fr] lg:items-stretch">
        <div class="pixel-panel aspect-square w-full max-w-[420px] p-4">
            <img
                src="{{ asset('images/illustrations/hero-about.png') }}"
                alt="{{ __('portfolio.about.window_title') }}"
                width="1600"
                height="1600"
                loading="eager"
                class="size-full rounded-lg object-contain"
            >
        </div>

        <div class="pixel-panel flex flex-col overflow-hidden p-0">
            {{-- Tło kafelka — wyeksportuj wg docs/assets-guide.md (#6) i wrzuć jako chat-bg.webp. --}}
            <img
                src="{{ asset('images/illustrations/chat-bg.png') }}"
                alt=""
                aria-hidden="true"
                class="absolute inset-0 -z-20 size-full object-cover"
            >
            <div class="absolute inset-0 -z-10 bg-ink-950/75"></div>

            <div class="flex items-center justify-between border-b border-neon-purple-500/20 bg-ink-800/40 px-4 py-3">
                <div class="flex items-center gap-2">
                    <flux:icon.chat-bubble-left-right class="size-4 text-neon-cyan-400" />
                    <span class="font-mono text-xs text-mist-300">{{ __('portfolio.about.window_title') }}</span>
                </div>
                <flux:icon.ellipsis-vertical class="size-4 text-mist-700" />
            </div>

            <div class="flex flex-1 flex-col justify-center gap-3 p-4 sm:p-6">
                <div class="flex justify-end">
                    <div class="max-w-[85%] rounded-2xl rounded-br-sm bg-ink-700/80 px-4 py-2.5 text-sm leading-relaxed text-mist-100 shadow-sm">
                        {{ __('portfolio.about.question') }}
                    </div>
                </div>

                @foreach (__('portfolio.about.messages') as $message)
                    <div class="flex items-end gap-2">
                        <span class="relative block size-8 shrink-0 overflow-hidden rounded-full ring-1 ring-neon-purple-400/50">
                            <span
                                class="absolute inset-0 bg-[image:var(--avatar-img)] bg-cover"
                                style="--avatar-img: url('{{ asset('images/illustrations/hero-about.png') }}'); background-position: 44% 27%; background-size: 360%;"
                            ></span>
                        </span>
                        <div class="max-w-[85%] rounded-2xl rounded-bl-sm bg-violet-200 px-4 py-2.5 text-sm leading-relaxed text-ink-950 shadow-sm">
                            {{ $message }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
