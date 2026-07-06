<section id="about" class="mx-auto max-w-6xl scroll-mt-20 px-4 py-16 sm:px-6">
    <p class="kicker">{{ __('portfolio.about.kicker') }}</p>
    <h1 class="mt-2 font-pixel text-xl leading-relaxed text-mist-100 sm:text-2xl">
        {{ __('portfolio.about.title') }}
    </h1>

    <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,420px)_1fr] lg:items-center">
        <div class="pixel-panel aspect-square w-full max-w-[420px] p-4">
            <img
                src="{{ asset('images/illustrations/hero-about.webp') }}"
                alt="{{ __('portfolio.about.greeting') }}"
                width="1600"
                height="1600"
                loading="eager"
                class="size-full rounded-lg object-contain"
            >
        </div>

        <div class="pixel-panel p-6 sm:p-8">
            <p class="font-pixel text-sm text-neon-pink-400">{{ __('portfolio.about.greeting') }}</p>
            <p class="mt-4 text-base leading-relaxed text-mist-300">
                {{ __('portfolio.about.bio') }}
            </p>

            <ul class="mt-6 space-y-3">
                @foreach (__('portfolio.about.chips') as $chip)
                    <li class="flex items-center gap-3 rounded-lg border border-neon-purple-500/20 bg-ink-800/60 px-4 py-2.5 text-sm text-mist-100">
                        <flux:icon.sparkles class="size-4 shrink-0 text-neon-cyan-400" />
                        {{ $chip }}
                    </li>
                @endforeach
            </ul>

            <p class="mt-6 font-pixel text-xs text-neon-cyan-400">{{ __('portfolio.about.cta') }} ✦</p>
        </div>
    </div>
</section>
